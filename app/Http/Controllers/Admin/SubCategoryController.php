<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Sub_category;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function view()
    {
        $data = Sub_category::all();
        return view('vendor.backpack.base.sub_category.list', ['data' => $data]);
    }
    public function create()
    {
        $category = Category::where('status',1)->get();
        return view('vendor.backpack.base.sub_category.create', ['category' => $category]);
    }
    public function edit($id)
    {
        $data = Sub_category::find($id);
        $category = Category::get();
        return view('vendor.backpack.base.sub_category.edit', [
            'data' => $data,
            'category' => $category,
        ]);
    }
    public function insert(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255|unique:sub_category,deleted_at,NULL',
            'category_id' => 'required',
        ]);
        $imageName = "";

        $table = new Sub_category;
        $table->name = $request->input('name');
        $table->description = $request->input('description') ? $request->input('description') : '';
        $table->category_id = $request->input('category_id');
        $table->save();

        $request->session()->flash('insert', 'Success');
        return redirect()->route('sub_category_view');
    }
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255|unique:sub_category,name,'.$request->input('id').',id,deleted_at,NULL',
            'category_id' => 'required',
        ]);

        $imageName = "";

        $table = Sub_category::find($request->input('id'));
        $table->name = $request->input('name');
        $table->description = $request->input('description') ? $request->input('description') : '';
        $table->category_id = $request->input('category_id');
        $table->save();

        $request->session()->flash('update', 'Success');
        return redirect()->route('sub_category_view');
    }
    public function delete($id, Request $request)
    {
        $table = Sub_category::find($id);
        $table->delete();

        $request->session()->flash('delete', 'Success');
        return redirect()->route('sub_category_view');
    }

    public function status($id,$status){
        $table = Sub_category::find($id);
        $table->status = $status;
        $table->Save();

        return redirect()->route('sub_category_view');
    }
}
