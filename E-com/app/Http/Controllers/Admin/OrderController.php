<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
   public function index()
   {
       $query = DB::table('orders');
       $query = $query->leftJoin('order_status','order_status.id' ,'=','orders.order_status');
       $query = $query->select('orders.*','order_status.status');
       $query = $query->orderBy('orders.id','DESC');
       $query = $query->get();
       $result['data'] =  $query;
       return view('admins.orders',$result);
   }
   public function detail($id)
   {
     $result['data'] = DB::table('order_details')
             ->leftJoin('orders','orders.id','=','order_details.order_id')
             ->leftJoin('order_status','order_status.id' ,'=','orders.order_status')
             ->leftJoin('products','products.id','=','order_details.product_id')
             ->leftJoin('product_attr','product_attr.id','=','order_details.product_attr_id')
             ->leftJoin('sizes','sizes.id' ,'=','product_attr.size_id')
             ->leftJoin('colors','colors.id' ,'=','product_attr.color_id')
             ->where(['order_id'=>$id])
             ->select('orders.*','orders.name as customar','order_status.status','products.name','product_attr.attr_image','colors.color','sizes.size','order_details.price','order_details.qty')
             ->get();
       return view('admins.order_detail',$result);
   }
}
