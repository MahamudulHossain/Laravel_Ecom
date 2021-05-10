<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function index(){
      $result['home_banner'] = DB::table('banners')
                    ->where(['status'=>1])
                    ->get();

      $result['home_category'] = DB::table('categories')
                    ->where(['status'=>1])
                    ->where(['is_show_home'=>1])
                    ->get();

      foreach($result['home_category'] as $list){
       $result['home_category_product'][$list->id] = DB::table('products')
                      ->where(['status'=>1])
                      ->where(['category_id'=>$list->id])
                      ->get();
          foreach($result['home_category_product'][$list->id] as $list1){
            $result['home_category_product_attr'][$list1->id] = DB::table('product_attr')
                      ->leftJoin('sizes','sizes.id' ,'=','product_attr.size_id')
                      ->leftJoin('colors','colors.id' ,'=','product_attr.color_id')
                      ->where(['product_attr.product_id'=>$list1->id])
                      ->get();
          }
      }

      $result['home_brand'] = DB::table('brands')
                    ->where(['status'=>1])
                    ->where(['is_show_home'=>1])
                    ->get();

       $result['home_featured_product'][$list->id] = DB::table('products')
                   ->where(['status'=>1])
                   ->where(['is_featured'=>1])
                   ->get();
       foreach($result['home_featured_product'][$list->id] as $list1){
         $result['home_featured_product_attr'][$list1->id] = DB::table('product_attr')
                   ->leftJoin('sizes','sizes.id' ,'=','product_attr.size_id')
                   ->leftJoin('colors','colors.id' ,'=','product_attr.color_id')
                   ->where(['product_attr.product_id'=>$list1->id])
                   ->get();
       }

       $result['home_discounted_product'][$list->id] = DB::table('products')
                   ->where(['status'=>1])
                   ->where(['is_discounted'=>1])
                   ->get();
       foreach($result['home_discounted_product'][$list->id] as $list1){
         $result['home_discounted_product_attr'][$list1->id] = DB::table('product_attr')
                   ->leftJoin('sizes','sizes.id' ,'=','product_attr.size_id')
                   ->leftJoin('colors','colors.id' ,'=','product_attr.color_id')
                   ->where(['product_attr.product_id'=>$list1->id])
                   ->get();
       }

       $result['home_tranding_product'][$list->id] = DB::table('products')
                   ->where(['status'=>1])
                   ->where(['is_tranding'=>1])
                   ->get();
       foreach($result['home_tranding_product'][$list->id] as $list1){
         $result['home_tranding_product_attr'][$list1->id] = DB::table('product_attr')
                   ->leftJoin('sizes','sizes.id' ,'=','product_attr.size_id')
                   ->leftJoin('colors','colors.id' ,'=','product_attr.color_id')
                   ->where(['product_attr.product_id'=>$list1->id])
                   ->get();
       }

          // echo "<pre>";
          // print_r($result);
          // die();
      return view('front.index',$result);
    }

    public function product_detail(Request $req,$slug){
      $result['product_detail'] = DB::table('products')
                  ->where(['status'=>1])
                  ->where(['slug'=>$slug])
                  ->get();
      foreach($result['product_detail'] as $list){
        $result['product_detail_attr'][$list->id] = DB::table('product_attr')
                  ->leftJoin('sizes','sizes.id' ,'=','product_attr.size_id')
                  ->leftJoin('colors','colors.id' ,'=','product_attr.color_id')
                  ->where(['product_attr.product_id'=>$list->id])
                  ->get();
      }
      foreach($result['product_detail'] as $list){
        $result['product_detail_images'][$list->id] = DB::table('product_images')
                  ->where(['product_images.product_id'=>$list->id])
                  ->get();
      }
      $result['related_products'] = DB::table('products')
                  ->where(['status'=>1])
                  ->where('category_id','=',$result['product_detail'][0]->category_id)
                  ->where('id','!=',$result['product_detail'][0]->id)
                  ->get();
      foreach($result['related_products'] as $list){
        $result['related_products_attr'][$list->id] = DB::table('product_attr')
                  ->leftJoin('sizes','sizes.id' ,'=','product_attr.size_id')
                  ->leftJoin('colors','colors.id' ,'=','product_attr.color_id')
                  ->where(['product_attr.product_id'=>$list->id])
                  ->get();
      }
    //  prx($result);
      return view('front.product_detail',$result);
    }
}
