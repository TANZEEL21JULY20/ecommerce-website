<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\http\Controllers\admincontroller;
use DB;

class admincontroller extends Controller
{
    function dashboard(){
        return view('admin.layout');
    }
    function login (){
        return view ("admin.login");
    }
    function login_post(Request $request){
        $user_name = $request->user_name;
        $password = $request->password;
        
        $login = DB::table('adminmodels')->select('user_name')->where(['user_name'=>$user_name , 'password'=>$password])->first();

        if($login){
            session(('user_name'->$login->user_name));
            return view('admin.layout');
        }
        else{
            return redirect()->back()->with('message','invalid credentials');
        }
    }
    function logout(){
        session()->forget('user_name');
        return view('admin.login');
    }
}
