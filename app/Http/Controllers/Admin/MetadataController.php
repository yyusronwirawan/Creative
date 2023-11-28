<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use DB;
use App\Models\Metadata;

class MetadataController extends Controller
{
    function view(){
    	$data = Metadata::get();
		//dd($data);
    	return view('vendor.backpack.base.metadata.list', ['data' => $data]);
    }
    function create(){

    	return view('vendor.backpack.base.metadata.create');
    }
    function edit($id){
		$data = Metadata::find($id);
    	return view('vendor.backpack.base.metadata.edit', ['data' => $data]);
    }
    function insert(Request $request){

    	$table = new Metadata;
        $table->page = $request->input('page');
    	$table->h1 = $request->input('h1');
    	$table->title = (null !== $request->input('title')) ? $request->input('title') : '';
    	$table->description = (null !== $request->input('description')) ? $request->input('description') : '';
    	$table->keyword = $request->input('keyword');
        $table->link = $request->input('link');
    	$table->save();

        $request->session()->flash('insert', 'Success');
		return redirect()->route('metadata_view');
    }

    function update(Request $request){
            $table = metadata::find($request->input('id'));
            $table->title = (null !== $request->input('title')) ? $request->input('title') : '';
            $table->page = $request->input('page');
            $table->h1 = $request->input('h1');
            $table->description = (null !== $request->input('description')) ? $request->input('description') : '';
            $table->keyword = $request->input('keyword');
            $table->link = $request->input('link');
            $table->save();


        $request->session()->flash('update', 'Success');
		return redirect()->route('metadata_view');
    }

    function delete($uid, Request $request){
    	$table = metadata::find($uid);
    	$table->delete();

        $request->session()->flash('delete', 'Success');
		return redirect()->route('metadata_view');
    }

    function status($id,$status){
    	$table = metadata::find($uid);
    	$table->status = $status;
    	$table->save();

		return redirect()->route('metadata_view');
    }
}
