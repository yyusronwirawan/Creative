<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function view()
    {
        $data = Menu::orderby('sort','asc')->get();
        return view('vendor.backpack.base.menu.list', ['data' => $data]);
    }
    public function create()
    {
        return view('vendor.backpack.base.menu.create');
    }
    public function edit($id)
    {
        $data = Menu::find($id);
        return view('vendor.backpack.base.menu.edit', ['data' => $data]);
    }
    public function insert(Request $request)
    {
        $last_sort = Menu::orderby('sort', 'desc')->first();
            $sort = 1;
            if($last_sort){
                $sort = $last_sort->sort + 1;
            }

        $table = new menu;
        $table->menu = $request->input('menu');
        $table->link = $request->input('link');
        $table->sort = $sort;
        $table->save();

        $request->session()->flash('insert', 'Success');
        return redirect('lakucreative-admin/dashboard');
    }
    public function update(Request $request)
    {

        $table = Menu::find($request->input('id'));
        $table->menu = $request->input('menu');
        $table->link = $request->input('link');
        $table->save();

        $request->session()->flash('update', 'Success');
        return redirect('lakucreative-admin/dashboard');
    }
    public function delete($id, Request $request)
    {
        $table = Menu::find($id);
        $table->delete();

        $request->session()->flash('delete', 'Success');
        return redirect('lakucreative-admin/dashboard');
    }

    public function status($id,$status){
        $table = Menu::find($id);
        $table->status = $status;
        $table->Save();

        return redirect('lakucreative-admin/dashboard');
    }

    public function update_sort(Request $request){
        $maincontent_id = $request->input('maincontent_id');
        $oldsort = $request->input('oldsort');
        $newsort = $request->input('newsort');

        $getTable = Menu::where('id',$maincontent_id)->where('sort',$oldsort)->first();
        $getTable->sort = $newsort;
        $getTable->save();

        $status=array('status'=>'1','message'=>'Success');
        return response()->json($status);
    }
}
