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

    public function add_to_cart(Request $request){
      if($request->session()->has('USER_LOGIN_ID')){
        $user_id = $request->session()->get('USER_LOGIN_ID');
        $user_type = 'reg';
      }else{
        $user_id = getRandId();
        $user_type = 'not-reg';
      }
      $size_id = $request->post('size_id');
      $color_id = $request->post('color_id');
      $pro_qty = $request->post('pro_qty');
      $product_id = $request->post('product_id');

      $result   = DB::table('product_attr')
                ->select('product_attr.id')
                ->leftJoin('sizes','sizes.id' ,'=','product_attr.size_id')
                ->leftJoin('colors','colors.id' ,'=','product_attr.color_id')
                ->where(['sizes.size'=>$size_id])
                ->where(['colors.color'=>$color_id])
                ->where(['product_attr.product_id'=>$product_id])
                ->get();
      $product_attr_id = $result[0]->id;

      $check = DB::table('carts')
              ->where(['user_id'=>$user_id])
              ->where(['user_type'=>$user_type])
              ->where(['product_id'=>$product_id])
              ->where(['product_attr_id'=>$product_attr_id])
              ->get();
       if(isset($check[0]->id)){
         $uid = $check[0]->id;
          if($pro_qty == 0){
            DB::table('carts')
              ->where(['id'=>$uid])
              ->delete();
          }else{
            DB::table('carts')
              ->where(['id'=>$uid])
              ->update(['qty'=>$pro_qty]);
            $msg = "Product Updated";
          }
       }else{
         $id = DB::table('carts')->insertGetId([
               'user_id' => $user_id,
               'user_type' => $user_type,
               'qty' => $pro_qty,
               'product_id' => $product_id,
               'product_attr_id' => $product_attr_id,
               'added_on' =>date('Y-m-d h:i:s')
              ]);
          $msg = "Product Inserted";
       }
       $data = DB::table('carts')
               ->leftJoin('products','products.id','=','carts.product_id')
               ->leftJoin('product_attr','product_attr.id','=','carts.product_attr_id')
               ->leftJoin('sizes','sizes.id' ,'=','product_attr.size_id')
               ->leftJoin('colors','colors.id' ,'=','product_attr.color_id')
               ->where(['user_id'=>$user_id])
               ->where(['user_type'=>$user_type])
               ->select('products.name','product_attr.attr_image','products.slug','product_attr.price','carts.qty','colors.color','sizes.size','products.id as pid','product_attr.id as pro_attr_id')
               ->get();
       return response()->json(['msg'=>$msg,'data'=>$data,'totalCartItem'=>count($data)]);
    }

    public function mycart(Request $request){

      if($request->session()->has('USER_LOGIN_ID')){
        $user_id = $request->session()->get('USER_LOGIN_ID');
        $user_type = 'reg';
      }else{
        $user_id = getRandId();
        $user_type = 'not-reg';
      }

      $result['list'] = DB::table('carts')
              ->leftJoin('products','products.id','=','carts.product_id')
              ->leftJoin('product_attr','product_attr.id','=','carts.product_attr_id')
              ->leftJoin('sizes','sizes.id' ,'=','product_attr.size_id')
              ->leftJoin('colors','colors.id' ,'=','product_attr.color_id')
              ->where(['user_id'=>$user_id])
              ->where(['user_type'=>$user_type])
              ->select('products.name','product_attr.attr_image','products.slug','product_attr.price','carts.qty','colors.color','sizes.size','products.id as pid','product_attr.id as pro_attr_id')
              ->get();

      return view('front.cart',$result);
    }

    public function category_page(Request $request,$slug){

      $result['category_product'] = DB::table('products')
                  ->leftJoin('categories','categories.id' ,'=','products.category_id')
                  ->where(['products.status'=>1])
                  ->where(['categories.category_slug'=>$slug])
                  ->get();
      foreach($result['category_product'] as $list1){
        $result['category_product_attr'][$list1->id] = DB::table('product_attr')
                  ->leftJoin('sizes','sizes.id' ,'=','product_attr.size_id')
                  ->leftJoin('colors','colors.id' ,'=','product_attr.color_id')
                  ->where(['product_attr.product_id'=>$list1->id])
                  ->get();
      }
        return view('front.category',$result);
    }
}
