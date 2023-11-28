<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Admin;
class AuthController extends Controller
{
	function checkLogin(Request $request){
		$userData = session('__ADMINSESSION__');
        if($userData){
        	return redirect('lakucreative-admin/dashboard');
        }
		return view('vendor.backpack.base.auth.login');
	}
    function login(Request $request){
    	$username = $request->input('username');
        $password = md5($request->input('password'));
        
        $check = Admin::where('username',$username)->where('password',$password)->where('status',1)->first();
        //dd($check);
        if($check){
            $table = Admin::find($check->id);
            $table->last_login = date('Y-m-d H:i:s');
            $table->save();
            session(['__ADMINSESSION__' => $check]);
            return redirect('lakucreative-admin/dashboard');
        }
        else{
            return redirect('lakucreative-admin/login');
        }
		
    }

    function logout(Request $request){
    	$request->session()->flush();
    	return redirect('lakucreative-admin/login');
    }

    function changePassword(Request $request){
        return view('vendor.backpack.base.auth.change_password');
    }

    function updatePassword(Request $request){
        $getUser = session('__ADMINSESSION__');

        $old_password = $request->input('old_password');
        $password = $request->input('password');

        $validatedData = $request->validate([
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
        ]);
        
        $check = Admin::where('id',$getUser->id)->where('password',md5($old_password))->first();

        if($check){
            $table = Admin::find($check->id);
            $table->password = md5($password);
            $table->save();
            $request->session()->flash('change_success', 'Change Password Success!');
            return redirect()->route('change_password_view');
        }
        else{
            $request->session()->flash('change_fail', 'Current Password is Invalid');
            return redirect()->route('change_password_view');
        }
        
    }
}