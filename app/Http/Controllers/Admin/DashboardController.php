<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company_data;
use App\Models\Hubungi_kami;
use App\Models\Logo;
use App\Models\Menu;
use App\Models\Admin_color;
use App\Models\Mengapa;
use DB;

class DashboardController extends Controller
{

    public function view(Request $request){
        $getUser = session('__ADMINSESSION__');
        $menu = Menu::orderby('sort','asc')->get();
        $logo = Logo::first();
        return view('vendor.backpack.base.dashboard', ['menu'=> $menu, 'logo'=>$logo]);
    }

    public function about(){
    	$data = About::first();
    	return view('vendor.backpack.base.about', ['data'=>$data]);
    }

    public function about_update(Request $request)
    {
        $company_profile = About::first();
        if (empty($company_profile)) {
            $company_profile = new About;
        }

        $company_profile->content =str_replace('src="', 'src="'.env('BACKPANEL_URL').'', $request->input('content'));
        $company_profile->save();

        $request->session()->flash('update', 'Success');
        return redirect()->route('about_view');
    }

    public function company_data(){
        $data = Company_data::first();
        return view('vendor.backpack.base.company_data', ['data'=>$data]);
    }

    public function company_data_update(Request $request)
    {
        $company_profile = Company_data::first();
        if (empty($company_profile)) {
            $company_profile = new Company_data;
        }

        // $company_profile->facebook = $request->input('facebook');
        // $company_profile->instagram = $request->input('instagram');
        // $company_profile->pinterest = $request->input('pinterest');
        // $company_profile->bridestory = $request->input('bridestory');
        $company_profile->email = $request->input('email');
        // $company_profile->line = $request->input('line');
        $company_profile->whatsapp = $request->input('whatsapp');
        // $company_profile->address = $request->input('address');
        // $company_profile->telephone = $request->input('telephone');
        // $company_profile->hours = $request->input('hours');
        $company_profile->save();

        $request->session()->flash('update', 'Success');
        return redirect()->route('company_data_view');
    }

    public function terms(){
        $data = Terms::first();
        return view('vendor.backpack.base.terms', ['data'=>$data]);
    }

    public function terms_update(Request $request)
    {
        $company_profile = Terms::first();
        if (empty($company_profile)) {
            $company_profile = new Terms;
        }

        $company_profile->terms =str_replace('src="', 'src="'.env('BACKPANEL_URL').'', $request->input('content'));
        $company_profile->save();

        $request->session()->flash('update', 'Success');
        return redirect()->route('terms_view');
    }

    public function privacy_policy(){
        $data = Terms::first();
        return view('vendor.backpack.base.privacy_policy', ['data'=>$data]);
    }

    public function privacy_policy_update(Request $request)
    {
        $company_profile = Terms::first();
        if (empty($company_profile)) {
            $company_profile = new Terms;
        }

        $company_profile->privacy_policy =str_replace('src="', 'src="'.env('BACKPANEL_URL').'', $request->input('content'));
        $company_profile->save();

        $request->session()->flash('update', 'Success');
        return redirect()->route('privacy_policy_view');
    }

    public function contact(Request $request){
        $data = Contact::orderby('id','desc')->get();
        return view('vendor.backpack.base.contact.list', ['data'=>$data]);
    }

    public function contactDetail($id)
    {
        $data = Contact::find($id);
        return view('vendor.backpack.base.contact.detail', ['data'=>$data]);
    }

    public function contactDelete($id)
    {
        $data = Contact::find($id);
        $data->delete();
        return redirect()->route('contact_view');
    }

    public function hubungi_kami(){
        $data = Hubungi_kami::first();
        return view('vendor.backpack.base.hubungi_kami', ['data'=>$data]);
    }

    public function hubungi_kami_update(Request $request)
    {
        $company_profile = Hubungi_kami::first();
        if (empty($company_profile)) {
            $company_profile = new Hubungi_kami;
        }

        if ($request->hasFile('image')) {
            if ($request->input('old_image') != null) {
                $oldimage = base_path() . '/public/upload/' . $request->input('old_image');
                if (file_exists($oldimage)) {
                    unlink($oldimage);
                }
            }
            $imageName = md5(rand().rand()) . '.' . $request->file('image')->getClientOriginalExtension();
            $path = base_path() . '/public/upload';
            $request->file('image')->move($path, $imageName);
            
        } else {
            $imageName = $request->input('old_image');
        }

        if ($request->hasFile('chat_image')) {
            if ($request->input('old_image_chat') != null) {
                $oldimage = base_path() . '/public/upload/' . $request->input('old_image_chat');
                if (file_exists($oldimage)) {
                    unlink($oldimage);
                }
            }
            $imageNameChat = md5(rand().rand()) . '.' . $request->file('chat_image')->getClientOriginalExtension();
            $path = base_path() . '/public/upload';
            $request->file('chat_image')->move($path, $imageNameChat);
            
        } else {
            $imageNameChat = $request->input('old_image_chat');
        }


        $company_profile->pesan_link =$request->input('pesan_link');
        $company_profile->pesan_image =$imageName;
        $company_profile->chat_link =$request->input('chat_link');
        $company_profile->chat_image =$imageNameChat;
        $company_profile->save();

        $request->session()->flash('update', 'Success');
        return redirect()->route('hubungi_kami_view');
    }

    public function logo_update(Request $request)
    {
        $company_profile = Logo::first();

        if ($request->hasFile('image')) {
            if ($request->input('old_image') != null) {
                $oldimage = base_path() . '/public/upload/' . $request->input('old_image');
                if (file_exists($oldimage)) {
                    unlink($oldimage);
                }
            }
            $imageName = 'logo.' . $request->file('image')->getClientOriginalExtension();
            $path = base_path() . '/public/upload';
            $request->file('image')->move($path, $imageName);
            
        } else {
            $imageName = $request->input('old_image');
        }

        $company_profile->image =$imageName;
        $company_profile->save();

        $request->session()->flash('update', 'Success');
        return redirect('lakucreative-admin/dashboard');
    }

    public function admin_color(){
        $data = Admin_color::first();
        return view('vendor.backpack.base.admin_color', ['data'=>$data]);
    }

    public function update_admin_color(Request $request)
    {
        $company_profile = Admin_color::first();
        if (empty($company_profile)) {
            $company_profile = new Admin_color;
        }

        $company_profile->header =$request->input('header');
        $company_profile->sidebar =$request->input('sidebar');
        $company_profile->save();

        $request->session()->flash('update', 'Success');
        return redirect()->route('admin_color_view');
    }

    public function mengapa(){
        $data = Mengapa::first();
        return view('vendor.backpack.base.mengapa', ['data'=>$data]);
    }

    public function update_mengapa(Request $request)
    {
        $company_profile = Mengapa::first();
        if (empty($company_profile)) {
            $company_profile = new Mengapa;
        }

        if ($request->hasFile('image')) {
            if ($request->input('old_image') != null) {
                $oldimage = base_path() . '/public/upload/' . $request->input('old_image');
                if (file_exists($oldimage)) {
                    unlink($oldimage);
                }
            }
            $imageName = 'mengapa_'.rand().'.'.$request->file('image')->getClientOriginalExtension();
            $path = base_path() . '/public/upload';
            $request->file('image')->move($path, $imageName);
            
        } else {
            $imageName = $request->input('old_image');
        }

        $company_profile->image =$imageName;

        $company_profile->title =$request->input('title');
        $company_profile->description =$request->input('description');
        $company_profile->save();

        $request->session()->flash('update', 'Success');
        return redirect()->route('mengapa_view');
    }




}
