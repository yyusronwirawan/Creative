<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tentang_kami;
use Illuminate\Http\Request;

class TentangKamiController extends Controller
{
    public function view()
    {
        $data = Tentang_kami::orderby('sort','asc')->get();
        return view('vendor.backpack.base.tentang_kami.list', ['data' => $data]);
    }
    public function create()
    {
        return view('vendor.backpack.base.tentang_kami.create');
    }
    public function edit($id)
    {
        $data = Tentang_kami::find($id);
        return view('vendor.backpack.base.tentang_kami.edit', ['data' => $data]);
    }
    public function insert(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255|unique:tentang_kami',
        ]);

        $imageName = "";
        $imageNameMobile = "";
        $last_sort = Tentang_kami::orderby('sort', 'desc')->first();
            $sort = 1;
            if($last_sort){
                $sort = $last_sort->sort + 1;
            }

        $table = new Tentang_kami;
        $table->title = $request->input('title');
        $table->image = $imageName;
        $table->link = $request->input('link');
        $table->description = $request->input('description');
        $table->sort = $sort;
        $table->save();

        $detail = Tentang_kami::where('id',$table->id)->first();
        if ($request->hasFile('image')) {
            $imageTempName = $request->file('image')->getPathname();
            $imageName = $detail->slug . '.' . $request->file('image')->getClientOriginalExtension();
            $path = base_path() . '/public/upload';
            $request->file('image')->move($path, $imageName);

            $detail->image = $imageName;
            $detail->save();
        }

        $request->session()->flash('insert', 'Success');
        return redirect()->route('tentang_kami_view');
    }
    public function update(Request $request)
    {
        // $validatedData = $request->validate([
        //     'title' => 'required|max:255|unique:tentang_kami,title,'.$request->input('id'),
        // ]);

        $imageName = "";
        $imageNameMobile = "";

        $table = Tentang_kami::find($request->input('id'));
        $table->title = $request->input('title');
        $table->image = $imageName;
        $table->link = $request->input('link');
        $table->description = $request->input('description');
        $table->save();

        $detail = Tentang_kami::where('id',$request->input('id'))->first();
        if ($request->hasFile('image')) {
            if ($request->input('old_image') != null) {
                $oldimage = base_path() . '/public/upload/' . $request->input('old_image');
                if (file_exists($oldimage)) {
                    unlink($oldimage);
                }
            }

            $imageTempName = $request->file('image')->getPathname();
            $imageName = $detail->slug . '.' . $request->file('image')->getClientOriginalExtension();
            $path = base_path() . '/public/upload';
            $request->file('image')->move($path, $imageName);
            
        } else {
            $imageName = $request->input('old_image');
        }


        $detail->image = $imageName;
        $detail->save();
        $request->session()->flash('update', 'Success');
        return redirect()->route('tentang_kami_view');
    }
    public function delete($id, Request $request)
    {
        $table = Tentang_kami::find($id);
        $table->delete();

        $request->session()->flash('delete', 'Success');
        return redirect()->route('tentang_kami_view');
    }

    public function status($id,$status){
        $table = Tentang_kami::find($id);
        $table->status = $status;
        $table->Save();

        return redirect()->route('tentang_kami_view');
    }

    public function update_sort(Request $request){
        $maincontent_id = $request->input('maincontent_id');
        $oldsort = $request->input('oldsort');
        $newsort = $request->input('newsort');

        $getTable = Tentang_kami::where('id',$maincontent_id)->where('sort',$oldsort)->first();
        $getTable->sort = $newsort;
        $getTable->save();

        $status=array('status'=>'1','message'=>'Success');
        return response()->json($status);
    }
}
