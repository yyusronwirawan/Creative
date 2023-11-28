<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use DB;
use App\Models\Category;

class CategoryController extends Controller
{
    function view(){
    	$data = Category::all();
    	return view('vendor.backpack.base.category.list', ['data' => $data]);
    }
    function create(){
    	return view('vendor.backpack.base.category.create');
    }
    function edit($id){
		$data = Category::find($id);
    	return view('vendor.backpack.base.category.edit', ['data' => $data]);
    }
    function insert(Request $request){
			$validatedData = $request->validate([
				'name' => 'required|max:255|unique:category,deleted_at,NULL',
			]);

			$imageName = "";

	        $table = new Category;
	        $table->name = $request->input('name');
	        $table->image = $imageName;
	        $table->description = $request->input('description');
	        $table->save();

	        // $detail = Category::where('id',$table->id)->first();
	        // if ($request->hasFile('image')) {
	        //     $imageTempName = $request->file('image')->getPathname();
	        //     $imageName = $detail->slug . '.' . $request->file('image')->getClientOriginalExtension();
	        //     $path = base_path() . '/public/upload';
	        //     $request->file('image')->move($path, $imageName);

	        //     $detail->image = $imageName;
	        //     $detail->save();
	        // }

			$request->session()->flash('insert', 'Success');
			return redirect()->route('category_view');
		}
    function update(Request $request){
			$validatedData = $request->validate([
				'name' => 'required|max:255|unique:category,name,'.$request->input('id').',id,deleted_at,NULL',
			]);
			
	    	$imageName = "";

	        $table = Category::find($request->input('id'));
	        $table->name = $request->input('name');
	        $table->image = $imageName;
	        $table->description = $request->input('description');
	        $table->save();

	        // $detail = Category::where('id',$request->input('id'))->first();
	        // if ($request->hasFile('image')) {
	        //     if ($request->input('old_image') != null) {
	        //         $oldimage = base_path() . '/public/upload/' . $request->input('old_image');
	        //         if (file_exists($oldimage)) {
	        //             unlink($oldimage);
	        //         }
	        //     }

	        //     $imageTempName = $request->file('image')->getPathname();
	        //     $imageName = $detail->slug . '.' . $request->file('image')->getClientOriginalExtension();
	        //     $path = base_path() . '/public/upload';
	        //     $request->file('image')->move($path, $imageName);
	            
	        // } else {
	        //     $imageName = $request->input('old_image');
	        // }
	        // $detail->image = $imageName;
	        // $detail->save();

	    	$request->session()->flash('update', 'Success');
			return redirect()->route('category_view');
		}
	function delete($id, Request $request){
    	$table = Category::find($id);
    	$table->delete();

    	$request->session()->flash('delete', 'Success');
		return redirect()->route('category_view');
    }

    public function status($id,$status){
        $table = Category::find($id);
        $table->status = $status;
        $table->Save();

        return redirect()->route('category_view');
    }
}
