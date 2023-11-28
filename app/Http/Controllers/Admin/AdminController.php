<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function view()
    {
        $data = Admin::orderby('id','desc')->get();
        return view('vendor.backpack.base.admin.list', ['data' => $data]);
    }
    public function create()
    {
        return view('vendor.backpack.base.admin.create');
    }
    public function edit($id)
    {
        $data = Admin::find($id);
        return view('vendor.backpack.base.admin.edit', ['data' => $data]);
    }
    public function insert(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|max:255|unique:admin',
        ]);

        $table = new Admin;
        $table->username = $request->input('username');
        $table->email = $request->input('username');
        $table->password = md5($request->input('password'));
        $table->last_login = date('Y-m-d H:i:s');
        $table->status = 1;
        $table->save();

        $request->session()->flash('insert', 'Success');
        return redirect()->route('admin_view');
    }
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|max:255|unique:admin,username,'.$request->input('id'),
        ]);

        $imageName = "";

        $table = Admin::find($request->input('id'));
        $table->username = $request->input('username');
        $table->email = $request->input('username');
        if($request->input('password') != ''){
            $table->password = md5($request->input('password'));
        }
        $table->save();
        $request->session()->flash('update', 'Success');
        return redirect()->route('admin_view');
    }
    public function delete($id, Request $request)
    {
        $table = Admin::find($id);
        $table->delete();

        $request->session()->flash('delete', 'Success');
        return redirect()->route('admin_view');
    }

    public function status($id,$status){
        $table = Admin::find($id);
        $table->status = $status;
        $table->Save();

        return redirect()->route('admin_view');
    }
}
