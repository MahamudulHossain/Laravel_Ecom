<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
       $result['data'] = DB::table('review')
                           ->leftJoin('products','products.id' ,'=','review.product_id')
                           ->leftJoin('customers','customers.id' ,'=','review.customer_id')
                           ->select('products.name','customers.name as cusnam','review.id','review.rating','review.review','review.status','review.added_on')
                           ->orderBy('review.id', 'DESC')
                           ->get();
         return view('admins.reviews',$result);
     }
     public function delete(Request $request,$id)
     {
       $result = DB::table('review')
                ->where('id',$id)
                ->delete();

       $request->session()->flash('message','Review Deleted Successfully');
       return redirect('/admins/reviews');
     }
     public function manage_reviews_status(Request $request,$status,$id)
     {

       $result = DB::table('review')
                ->where('id',$id)
                ->update(['status'=>$status]);
       $request->session()->flash('message','Review Status Updated');
       return redirect('/admins/reviews');
     }
}
