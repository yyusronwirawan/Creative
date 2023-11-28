<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Social_media;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    public function view()
    {
        $data = Social_media::orderby('sort','asc')->get();
        return view('vendor.backpack.base.social_media.list', ['data' => $data]);
    }
    public function create()
    {
        return view('vendor.backpack.base.social_media.create');
    }
    public function edit($id)
    {
        $data = Social_media::find($id);
        return view('vendor.backpack.base.social_media.edit', ['data' => $data]);
    }
    public function insert(Request $request)
    {

        $imageName = "";
        $last_sort = Social_media::orderby('sort', 'desc')->first();
            $sort = 1;
            if($last_sort){
                $sort = $last_sort->sort + 1;
            }

        $table = new Social_media;
        $table->name = $request->input('name');
        $table->link = $request->input('link');
        $table->image = $imageName;
        $table->sort = $sort;
        $table->save();

        $detail = Social_media::where('id',$table->id)->first();
        if ($request->hasFile('image')) {
            $imageTempName = $request->file('image')->getPathname();
            $imageName = $detail->slug . '.' . $request->file('image')->getClientOriginalExtension();
            $path = base_path() . '/public/upload';
            $request->file('image')->move($path, $imageName);

            $detail->image = $imageName;
            $detail->save();
        }

        $request->session()->flash('insert', 'Success');
        return redirect()->route('social_media_view');
    }
    public function update(Request $request)
    {
        $imageName = "";

        $table = Social_media::find($request->input('id'));
        $table->name = $request->input('name');
        $table->link = $request->input('link');
        $table->image = $imageName;
        $table->save();

        $detail = Social_media::where('id',$request->input('id'))->first();
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
        return redirect()->route('social_media_view');
    }
    public function delete($id, Request $request)
    {
        $table = Social_media::find($id);
        $table->delete();

        $request->session()->flash('delete', 'Success');
        return redirect()->route('social_media_view');
    }

    public function status($id,$status){
        $table = Social_media::find($id);
        $table->status = $status;
        $table->Save();

        return redirect()->route('social_media_view');
    }

    public function update_sort(Request $request){
        $maincontent_id = $request->input('maincontent_id');
        $oldsort = $request->input('oldsort');
        $newsort = $request->input('newsort');

        $getTable = Social_media::where('id',$maincontent_id)->where('sort',$oldsort)->first();
        $getTable->sort = $newsort;
        $getTable->save();

        $status=array('status'=>'1','message'=>'Success');
        return response()->json($status);
    }
}
