<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
       $result['data'] = Coupon::all();
         return view('admins.coupon',$result);
     }
     public function manage_coupon($id='')
     {
       if($id>0){
         $arr = Coupon::where('id',$id)->get();
         $result['title'] = $arr['0']['title'];
         $result['coupon_slug'] = $arr['0']['coupon_slug'];
         $result['value'] = $arr['0']['value'];
         $result['type'] = $arr['0']['type'];
         $result['min_order_amt'] = $arr['0']['min_order_amt'];
         $result['is_onetime'] = $arr['0']['is_onetime'];
         $result['id'] = $arr['0']['id'];
       }else{
         $result['title'] = '';
         $result['coupon_slug'] = '';
         $result['value'] = '';
         $result['type'] = '';
         $result['min_order_amt'] = '';
         $result['is_onetime'] = '';
         $result['id'] = 0;
       }
       return view('admins.manage_coupon',$result);
     }
     public function manage_coupon_process(Request $request)
     {
       //return $request->post();
       $request->validate([
         'title'=>'required',
         'value'=>'required',
         'coupon_slug'=>'required|unique:coupons,coupon_slug,'.$request->post('id')
         //Checking slug when inserting (unique:categories) but when updating (,coupon_slug,'.$request->post('id'))
       ]);
       if($request->post('id') > 0){
         $model =Coupon::find($request->post('id'));
         $msg = "Coupon Updated Successfully";
       }else{
         $model = new Coupon;
         $msg = "Coupon Inserted Successfully";
       }
       $model->title = $request->post('title');
       $model->coupon_slug = $request->post('coupon_slug');
       $model->value = $request->post('value');
       $model->type = $request->post('type');
       $model->min_order_amt = $request->post('min_order_amt');
       $model->is_onetime = $request->post('is_onetime');
       $model->status = 1;
       $model->save();
       $request->session()->flash('message',$msg);
       return redirect('/admins/coupon');
     }
     public function delete(Request $request,$id)
     {
       $result = Coupon::find($id);
       $result->delete();
       $request->session()->flash('message','Coupon Deleted Successfully');
       return redirect('/admins/coupon');
     }
     public function manage_coupon_status(Request $request,$status,$id)
     {

       $result = Coupon::find($id);
       $result->status = $status;
       $result->save();
       $request->session()->flash('message','Coupon Status Updated');
       return redirect('/admins/coupon');
     }

}
