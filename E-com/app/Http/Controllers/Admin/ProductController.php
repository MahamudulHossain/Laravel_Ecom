<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
       $result['data'] = Product::all();
         return view('admins.product',$result);
     }
     public function manage_product($id='')
     {
       $result['category'] = DB::table('categories')->where(['status'=>'1'])->get();
       $result['size'] = DB::table('sizes')->where(['status'=>'1'])->get();
       $result['color'] = DB::table('colors')->where(['status'=>'1'])->get();
       $result['brand'] = DB::table('brands')->where(['status'=>'1'])->get();
       if($id>0){
         $arr = Product::where('id',$id)->get();
         $result['category_id'] = $arr['0']['category_id'];
         $result['slug'] = $arr['0']['slug'];
         $result['name'] = $arr['0']['name'];
         $result['brand_id'] = $arr['0']['brand_id'];
         $result['model'] = $arr['0']['model'];
         $result['short_desc'] = $arr['0']['short_desc'];
         $result['desc'] = $arr['0']['desc'];
         $result['keywords'] = $arr['0']['keywords'];
         $result['technical_specification'] = $arr['0']['technical_specification'];
         $result['uses'] = $arr['0']['uses'];
         $result['warrenty'] = $arr['0']['warrenty'];
         $result['lead_time'] = $arr['0']['lead_time'];
         $result['is_promo'] = $arr['0']['is_promo'];
         $result['is_featured'] = $arr['0']['is_featured'];
         $result['is_discounted'] = $arr['0']['is_discounted'];
         $result['is_tranding'] = $arr['0']['is_tranding'];
         $result['id'] = $arr['0']['id'];

         //For product Attribute box
         $result['proAttrArr'] = DB::table('product_attr')->where(['product_id'=>$id])->get();

         //More images
         $proImgArr = DB::table('product_images')->where(['product_id'=>$id])->get();
         if(!isset($proImgArr[0])){
           $result['proImgArr'][0]['id'] = '';
           $result['proImgArr'][0]['images'] = '';
         }else{
           $result['proImgArr'] = $proImgArr;
         }
         // echo '<pre>';
         // print_r($result['proAttrArr']);
         // die();
       }else{
         $result['category_id'] = '';
         $result['slug'] = '';
         $result['name'] = '';
         $result['image'] = '';
         $result['brand_id'] = '';
         $result['model'] = '';
         $result['short_desc'] = '';
         $result['desc'] = '';
         $result['keywords'] = '';
         $result['technical_specification'] = '';
         $result['uses'] = '';
         $result['warrenty'] = '';
         $result['lead_time'] = '';
         $result['is_promo'] = '';
         $result['is_featured'] = '';
         $result['is_discounted'] = '';
         $result['is_tranding'] = '';
         $result['id'] = 0;

         //For product Attribute box
         $result['proAttrArr'][0]['id'] = '';
         $result['proAttrArr'][0]['color_id'] = '';
         $result['proAttrArr'][0]['size_id'] = '';
         $result['proAttrArr'][0]['tag'] = '';
         $result['proAttrArr'][0]['mrp'] = '';
         $result['proAttrArr'][0]['price'] = '';
         $result['proAttrArr'][0]['qty'] = '';
         $result['proAttrArr'][0]['attr_image'] = '';

         //Product More images
         $result['proImgArr'][0]['id'] = '';
         $result['proImgArr'][0]['images'] = '';
       }
       return view('admins.manage_product',$result);
     }
     public function manage_product_process(Request $request)
     {
       if($request->post('id') > 0){
         $image_validation = 'mimes:jpeg,jpg,png';
       }else{
         $image_validation = 'required|mimes:jpeg,jpg,png';
       }
       // echo "<pre>";
       // print_r($request->post());
       // die();
       $request->validate([
         'name'=>'required',
         'image'=>$image_validation,
         'slug'=>'required|unique:products,slug,'.$request->post('id'),
         //Checking slug when inserting (unique:products) but when updating (,slug,'.$request->post('id'))
         'attr_image.*' => 'mimes:jpeg,jpg,png',
         'more_images.*' => 'mimes:jpeg,jpg,png'
       ]);


       /*Product Attribute*/
       $paid = $request->post('paid');
       $color_id = $request->post('color_id');
       $size_id = $request->post('size_id');
       $tag = $request->post('tag');
       $mrp = $request->post('mrp');
       $price = $request->post('price');
       $qty = $request->post('qty');

       // unique tag validation
       foreach ($tag as $key => $value) {
       $check = DB::table('product_attr')
                ->where('tag','=',$tag[$key])
                ->where('id','!=',$paid[$key])
                ->get();
        if(isset($check[0])){
          $request->session()->flash('tag_error','tag '.$tag[$key].' already used');
          return redirect(request()->headers->get('referer'));
        }
        }
       if($request->post('id') > 0){
         $model =Product::find($request->post('id'));
         $msg = "Product Updated Successfully";
       }else{
         $model = new Product;
         $msg = "Product Inserted Successfully";
       }
       if($request->hasfile('image')){
         if($request->post('id')>0){
             $ImgArr = DB::table('products')->where('id', $request->post('id'))->get();
             // echo '<pre>';
             // print_r($ImgArr[0]->image);
             // die();
             if(Storage::exists('/public/media/'.$ImgArr[0]->image)){
               Storage::delete('/public/media/'.$ImgArr[0]->image);
             }
          }
         $image = $request->file('image');
         $ext = $image->extension();
         $image_name = time().'.'.$ext;
         $image->storeAs('/public/media',$image_name);
         $model->image = $image_name;
       }
       $model->category_id = $request->post('category_id');
       $model->slug = $request->post('slug');
       $model->name = $request->post('name');
       $model->brand_id = $request->post('brand_id');
       $model->model = $request->post('model');
       $model->short_desc = $request->post('short_desc');
       $model->desc = $request->post('desc');
       $model->keywords = $request->post('keywords');
       $model->technical_specification = $request->post('technical_specification');
       $model->uses = $request->post('uses');
       $model->warrenty = $request->post('warrenty');
       $model->lead_time = $request->post('lead_time');
       $model->is_promo = $request->post('is_promo');
       $model->is_featured = $request->post('is_featured');
       $model->is_discounted = $request->post('is_discounted');
       $model->is_tranding = $request->post('is_tranding');
       $model->status = 1;
       $model->save();
       $pid = $model -> id; //taking id of recently added product


       foreach ($tag as $key => $value) {
         $productArr=[]; /*Initializing blank array to avoid same image in all fields*/
         $productArr['product_id'] = $pid;
         if($color_id[$key] == ''){
           $productArr['color_id'] = 0;
         }else{
           $productArr['color_id'] = $color_id[$key];
         }
         if($size_id[$key] == ''){
           $productArr['size_id'] = 0;
         }else{
           $productArr['size_id'] = $size_id[$key];
         }
         $productArr['tag'] = $tag[$key];
         $productArr['mrp'] = (int)$mrp[$key];
         $productArr['price'] = (int)$price[$key];
         $productArr['qty'] = (int)$qty[$key];

         if($request->hasfile("attr_image.$key")){
           if($paid[$key]>0){
               $ImgArr = DB::table('product_attr')->where('id', $paid[$key])->get();
               // echo '<pre>';
               // print_r($ImgArr[0]->attr_image);
               // die();
               if(Storage::exists('/public/media/'.$ImgArr[0]->attr_image)){
                 Storage::delete('/public/media/'.$ImgArr[0]->attr_image);
               }
            }
           $rand = rand(111111111,999999999);
           $attr_image = $request->file("attr_image.$key");
           $attr_img_ext = $attr_image->extension();
           $attr_image_name = $rand.'.'.$attr_img_ext;
           $attr_image->storeAs('/public/media',$attr_image_name);
           $productArr['attr_image'] = $attr_image_name;
         }

         if($paid[$key] !=''){
           DB::table('product_attr')->where('id',$paid[$key])->update($productArr);
         }else{
           DB::table('product_attr')->insert($productArr);
         }
       }

       /*Product More Images*/
       $piid = $request->post('piid');
       foreach ($piid as $key => $value) {
         $productImgArr['product_id'] = $pid;
         if($request->hasfile("more_images.$key")){
           if($piid[$key]>0){
               $ImgArr = DB::table('product_images')->where('id', $piid[$key])->get();
               // echo '<pre>';
               // print_r($ImgArr[0]->images);
               // die();
               if(Storage::exists('/public/media/'.$ImgArr[0]->images)){
                 Storage::delete('/public/media/'.$ImgArr[0]->images);
               }
            }
           $rand = rand(111111111,999999999);
           $more_images = $request->file("more_images.$key");
           $more_images_ext = $more_images->extension();
           $more_images_name = $rand.'.'.$more_images_ext;
           $more_images->storeAs('/public/media',$more_images_name);
           $productImgArr['images'] = $more_images_name;

           if($piid[$key] !=''){
             DB::table('product_images')->where('id',$piid[$key])->update($productImgArr);
           }else{
             DB::table('product_images')->insert($productImgArr);
           }
         }
       }
       $request->session()->flash('message',$msg);
       return redirect('/admins/product');
     }
     public function delete(Request $request,$id)
     {
       $result = Product::find($id);
       $result->delete();
       $request->session()->flash('message','Product Deleted Successfully');
       return redirect('/admins/product');
     }

     public function manage_product_delete(Request $request,$paid,$pid)
     {
       $ImgArr = DB::table('product_attr')->where('id', $paid)->get();
       // echo '<pre>';
       // print_r($ImgArr[0]->attr_image);
       // die();
       if(Storage::exists('/public/media/'.$ImgArr[0]->attr_image)){
         Storage::delete('/public/media/'.$ImgArr[0]->attr_image);
       }
       DB::table('product_attr')->where('id',$paid)->delete();
       return redirect('/admins/product/manage_product/'.$pid);
     }

     public function manage_product_imgs_delete(Request $request,$piid,$pid)
     {
       $ImgArr = DB::table('product_images')->where('id', $piid)->get();
       // echo '<pre>';
       // print_r($ImgArr[0]->images);
       // die();
       if(Storage::exists('/public/media/'.$ImgArr[0]->images)){
         Storage::delete('/public/media/'.$ImgArr[0]->images);
       }
       DB::table('product_images')->where('id',$piid)->delete();
       return redirect('/admins/product/manage_product/'.$pid);
     }

     public function manage_product_status(Request $request,$status,$id)
     {
       $result = Product::find($id);
       $result->status = $status;
       $result->save();
       $request->session()->flash('message','Product Status Updated');
       return redirect('/admins/product');
     }
}
