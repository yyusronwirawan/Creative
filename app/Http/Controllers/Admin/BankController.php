<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function view()
    {
        $data = Bank::orderby('sort','asc')->get();
        return view('vendor.backpack.base.bank.list', ['data' => $data]);
    }
    public function create()
    {
        return view('vendor.backpack.base.bank.create');
    }
    public function edit($id)
    {
        $data = Bank::find($id);
        return view('vendor.backpack.base.bank.edit', ['data' => $data]);
    }
    public function insert(Request $request)
    {

        $imageName = "";
        $last_sort = Bank::orderby('sort', 'desc')->first();
            $sort = 1;
            if($last_sort){
                $sort = $last_sort->sort + 1;
            }

        $table = new Bank;
        $table->bank = $request->input('bank');
        $table->image = $imageName;
        $table->sort = $sort;
        $table->save();

        $detail = Bank::where('id',$table->id)->first();
        if ($request->hasFile('image')) {
            $imageTempName = $request->file('image')->getPathname();
            $imageName = $detail->slug . '.' . $request->file('image')->getClientOriginalExtension();
            $path = base_path() . '/public/upload';
            $request->file('image')->move($path, $imageName);

            $detail->image = $imageName;
            $detail->save();
        }

        $request->session()->flash('insert', 'Success');
        return redirect()->route('bank_view');
    }
    public function update(Request $request)
    {
        $imageName = "";

        $table = Bank::find($request->input('id'));
        $table->bank = $request->input('bank');
        $table->image = $imageName;
        $table->save();

        $detail = Bank::where('id',$request->input('id'))->first();
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
        return redirect()->route('bank_view');
    }
    public function delete($id, Request $request)
    {
        $table = Bank::find($id);
        $table->delete();

        $request->session()->flash('delete', 'Success');
        return redirect()->route('bank_view');
    }

    public function status($id,$status){
        $table = Bank::find($id);
        $table->status = $status;
        $table->Save();

        return redirect()->route('bank_view');
    }

    public function update_sort(Request $request){
        $maincontent_id = $request->input('maincontent_id');
        $oldsort = $request->input('oldsort');
        $newsort = $request->input('newsort');

        $getTable = Bank::where('id',$maincontent_id)->where('sort',$oldsort)->first();
        $getTable->sort = $newsort;
        $getTable->save();

        $status=array('status'=>'1','message'=>'Success');
        return response()->json($status);
    }
}
