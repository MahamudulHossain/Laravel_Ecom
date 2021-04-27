<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       if($request->session()->has('ADMIN_LOGIN')){
         return redirect('admins/dashboard');
       }else{
         return view('admins.login');
       }
    }

    public function admin_login_process(Request $req)
    {
        $email = $req->post('email');
        $pass = $req->post('password');
        $result = Admin::where('email',$email)->first();
        if($result){
          if (Hash::check($pass, $result->password)) {
            $req->session()->put('ADMIN_LOGIN',true);
            $req->session()->put('ADMIN_ID',$result->id);
            return redirect('admins/dashboard');
          }else{
            $req->session()->flash('error','Please Enter Correct Password');
            return redirect('/admins');
          }
        }else{
           $req->session()->flash('error','Please Enter Valid Email Id');
           return redirect('/admins');
        }
    }

    public function dashboard()
    {
      return view('admins.dashboard');
    }
    /* Using Hash for admin password hashing
    public function adminpassHashing()
    {
      $res = Admin::find(1);
      $res -> password = Hash::make('1234');
      $res->save();
      dd($res);
    }*/
}
