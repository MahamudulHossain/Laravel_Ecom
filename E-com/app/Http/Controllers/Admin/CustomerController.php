<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         $result['data'] = Customer::all();
         return view('admins.customer',$result);
     }
     public function show($id)
     {
       $arr = Customer::where('id',$id)->get();
       // echo '<pre>';
       // print_r($arr);
       // die();
       $result['name'] = $arr['0']['name'];
       $result['email'] = $arr['0']['email'];
       $result['address'] = $arr['0']['address'];
       $result['city'] = $arr['0']['city'];
       $result['phone'] = $arr['0']['phone'];
       $result['created_at'] = $arr['0']['created_at'];
       $result['updated_at'] = $arr['0']['updated_at'];
       return view('admins.manage_customer',$result);
     }
     public function manage_customer_status(Request $request,$status,$id)
     {

       $result = Customer::find($id);
       $result->status = $status;
       $result->save();
       $request->session()->flash('message','Customer Status Updated');
       return redirect('/admins/customer');
     }

}
