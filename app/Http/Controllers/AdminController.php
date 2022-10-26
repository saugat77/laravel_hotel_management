<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Cookie;

class AdminController extends Controller
{
    //login
    public function login(){
        return view('login');
    }
    //check login
    public function check_login(Request $request){
        $validated = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $admin = Admin::where(['username'=>$request->username,'password'=>sha1($request->password)])->count();
        // dd($request);
        if($admin>0){
            $adminData = Admin::where(['username'=>$request->username,'password'=>sha1($request->password)])->get();
            session(['adminData'=>$adminData]);
            if($request->has('rememberme')){
                Cookie::queue('adminuser',$request->username,1440);
                Cookie::queue('adminpwd',$request->password,1440);
            }
            return redirect('admin');

        }
        else{
             notify()->error('Invalid Username/Password');
            return redirect('admin/login');
        }
    }
    function logout(){
       session()->forget(['adminData']);
       notify()->success('Logged out Sucessfully');
       return redirect('admin/login');

    }
}
