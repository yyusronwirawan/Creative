<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Design;
use App\Models\Design_image;
use Illuminate\Http\Request;
use DB;
use Image;

class DesignController extends Controller
{
    public function view()
    {
        $data = Design::orderby('sort','asc')->get();
        return view('vendor.backpack.base.design.list', ['data' => $data]);
    }
    public function create()
    {
        return view('vendor.backpack.base.design.create');
    }
    public function edit($id)
    {
        $data = Design::find($id);
        return view('vendor.backpack.base.design.edit', ['data' => $data]);
    }
    public function insert(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255|unique:design,deleted_at,NULL',
        ]);
        DB::transaction(function () use($request) {
            $imageName = "";
            $last_sort = Design::orderby('sort', 'desc')->first();
            $sort = 1;
            if($last_sort){
                $sort = $last_sort->sort + 1;
            }

            $design = new Design;
            $design->name = $request->input('name');
            $design->description = $request->input('description');
            $design->sort = $sort;
            $design->save();

            $total_images = $request->input('total_images');

            for($i=0;$i<$total_images;$i++){
                $award_image = '';
                if (isset($request->file('image')[$i])) {
                    //$imageTempName = $request->file('image')[$i]->getPathname();
                    $imageAward = md5(rand().'_'.rand().'_'.rand()).'.'.$request->file('image')[$i]->getClientOriginalExtension();
                    $path = base_path() . '/public/upload';
                    //$request->file('image')[$i]->move($path, $imageAward);

                    $img = $request->file('image')[$i];
                    $destinationPath = base_path() . '/public/upload';
                    $img->move($destinationPath, $imageAward);

                    $award_image = $imageAward;

                    $design_image = new Design_image;
                    $design_image->design_id = $design->id;
                    $design_image->image = $award_image;
                    $design_image->save();

                }
            }
            });
        $request->session()->flash('insert', 'Success');
        return redirect()->route('design_view');
    }
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255|unique:design,name,'.$request->input('id').',id,deleted_at,NULL',
        ]);
        DB::transaction(function () use($request) {

        $imageName = "";

        $design = Design::find($request->input('id'));
        $design->name = $request->input('name');
        $design->description = $request->input('description');
        $design->save();

        $total_images = $request->input('total_images');
        for($i=0;$i<$total_images;$i++){
            $award_image = '';
            if (isset($request->file('image')[$i])) {
                if (isset($request->input('old_image')[$i])) {
                    $oldimage_award = base_path() . '/public/upload/' . $request->input('old_image')[$i];
                    if (file_exists($oldimage_award)) {
                        unlink($oldimage_award);
                    }
                }

                // $imageTempName = $request->file('image')[$i]->getPathname();
                $imageAward = md5(rand().'_'.rand().'_'.rand()).'.'.$request->file('image')[$i]->getClientOriginalExtension();
                $path = base_path() . '/public/upload';
                $request->file('image')[$i]->move($path, $imageAward);

                $award_image = $imageAward;

                if(isset($request->input('design_image_id')[$i])){
                    $design_image = Design_image::find($request->input('design_image_id')[$i]);
                }else{
                    $design_image = new Design_image;
                }
                $design_image->design_id = $design->id;
                $design_image->image = $award_image;
                $design_image->save();
                

            }else {
                if (isset($request->input('old_image')[$i])) {
                    $award_image = $request->input('old_image')[$i];
                }else{
                    if(isset($request->input('design_image_id')[$i])){
                        Design_image::find($request->input('design_image_id')[$i])->delete();
                    }
                }

                if($award_image != ''){
                    if(isset($request->input('design_image_id')[$i])){
                        $design_image = Design_image::find($request->input('design_image_id')[$i]);
                    }else{
                        $design_image = new Design_image;
                    }
                    $design_image->design_id = $design->id;
                    $design_image->image = $award_image;
                    $design_image->save();
                }

            }
        }
            
            
        });

        $request->session()->flash('update', 'Success');
        return redirect()->route('design_view');
    }
    public function delete($id, Request $request)
    {
        $table = Design::find($id);
        $table->delete();

        $request->session()->flash('delete', 'Success');
        return redirect()->route('design_view');
    }

    public function status($id,$status){
        $table = Design::find($id);
        $table->status = $status;
        if($status == 1){
            $table->created_at = date('Y-m-d H:i:s');
        }
        $table->Save();

        return redirect()->route('design_view');
    }

    public function update_sort(Request $request){
        $maincontent_id = $request->input('maincontent_id');
        $oldsort = $request->input('oldsort');
        $newsort = $request->input('newsort');

        $getTable = Design::where('id',$maincontent_id)->where('sort',$oldsort)->first();
        $getTable->sort = $newsort;
        $getTable->save();

        $status=array('status'=>'1','message'=>'Success');
        return response()->json($status);
    }

}
