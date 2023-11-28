<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\Http\Controllers\BaseController;
use App\Models\Company_data;
use App\Models\Banner;
use App\Models\Testimonial;
use App\Models\Tentang_kami;
use App\Models\Hubungi_kami;
use App\Models\Cara_kerja;
use App\Models\Bank;
use App\Models\Design;
use App\Models\Social_media;
use App\Models\Menu;
use App\Models\Logo;
use App\Models\Mengapa;
use View;
use App\Helper\HelperFunction;
use Session;
use Output;
use Status;
use Mail;
use DB;

class PageController extends Controller
{

    public function home(){
        $data['banner'] = Banner::where('status',1)->orderby('sort','asc')->get();
        $data['cara_kerja'] = Cara_kerja::where('status',1)->orderby('sort','asc')->get();
        $data['testimonial'] = Testimonial::where('status',1)->orderby('id','desc')->get();
        $data['bank'] = Bank::orderby('sort','asc')->get();
        $data['hubungi_kami'] = Hubungi_kami::first();
        $data['company_data'] = Company_data::first();
        $data['design'] = Design::where('status',1)->orderby('sort','asc')->get();
        $data['social_media'] = Social_media::orderby('sort','asc')->get();
        $data['menu'] = Menu::orderby('sort','asc')->get();
        $data['logo'] = Logo::first();
        $data['mengapa'] = Mengapa::first();
        return view('/index', $data);  
    }

    public function tentang_kami(){
        $data['hubungi_kami'] = Hubungi_kami::first();
        $data['company_data'] = Company_data::first();
        $data['tentang_kami'] = Tentang_kami::where('status',1)->orderby('sort','asc')->get();
        $data['social_media'] = Social_media::orderby('sort','asc')->get();
        $data['design'] = Design::where('status',1)->orderby('sort','asc')->get();
        $data['menu'] = Menu::orderby('sort','asc')->get();
        $data['logo'] = Logo::first();
        return view('/tentang-kami', $data);  
    }
}


