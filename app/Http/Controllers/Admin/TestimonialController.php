<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use DB;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    function view(){
    	$data = Testimonial::orderby('id','desc')->get();
    	return view('vendor.backpack.base.testimonial.list', ['data' => $data]);
    }
    function create(){
    	return view('vendor.backpack.base.testimonial.create');
    }
    function edit($id){
		$data = Testimonial::find($id);
    	return view('vendor.backpack.base.testimonial.edit', ['data' => $data]);
    }
    function insert(Request $request){

	        $table = new Testimonial;
	        $table->name = $request->input('name');
	        $table->testimonial = $request->input('testimonial');
	        $table->save();

			$request->session()->flash('insert', 'Success');
			return redirect()->route('testimonial_view');
		}
    function update(Request $request){

	        $table = Testimonial::find($request->input('id'));
	        $table->name = $request->input('name');
	        $table->testimonial = $request->input('testimonial');
	        $table->save();

	    	$request->session()->flash('update', 'Success');
			return redirect()->route('testimonial_view');
		}
	function delete($id, Request $request){
    	$table = Testimonial::find($id);
    	$table->delete();

    	$request->session()->flash('delete', 'Success');
		return redirect()->route('testimonial_view');
    }

    public function status($id,$status){
        $table = Testimonial::find($id);
        $table->status = $status;
        $table->Save();

        return redirect()->route('testimonial_view');
    }
}
