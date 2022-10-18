<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

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
        // dd($admin);
        if($admin>0){
            $adminData = Admin::where(['username'=>$request->username,'password'=>sha1($request->password)])->get();
            session(['adminData'=>$adminData]);
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
