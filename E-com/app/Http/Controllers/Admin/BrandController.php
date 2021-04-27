<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Storage;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
       $result['data'] = Brand::all();
         return view('admins.brand',$result);
     }
     public function manage_brand($id='')
     {
       if($id>0){
         $arr = Brand::where('id',$id)->get();
         $result['name'] = $arr['0']['name'];
         $result['image'] = $arr['0']['image'];
         $result['is_show_home'] = $arr['0']['is_show_home'];
         $result['id'] = $arr['0']['id'];
       }else{
         $result['name'] = '';
         $result['image'] = '';
         $result['is_show_home'] = '';
         $result['id'] = 0;
       }
       return view('admins.manage_brand',$result);
     }
     public function manage_brand_process(Request $request)
     {
       if($request->post('id') > 0){
         $image_validation = 'mimes:jpeg,jpg,png';
       }else{
         $image_validation = 'required|mimes:jpeg,jpg,png';
       }
       //return $request->post();
       $request->validate([
         'image'=>$image_validation,
         'name'=>'required|unique:brands,name,'.$request->post('id')
         ]);
       if($request->post('id') > 0){
         $model =Brand::find($request->post('id'));
         $msg = "Brand Updated Successfully";
       }else{
         $model = new Brand;
         $msg = "Brand Inserted Successfully";
       }
       if($request->hasfile('image')){
         if($request->post('id')>0){
             $ImgArr = DB::table('brands')->where('id', $request->post('id'))->get();
             // echo '<pre>';
             // print_r($ImgArr[0]->image);
             // die();
             if(Storage::exists('/public/media/brand/'.$ImgArr[0]->image)){
               Storage::delete('/public/media/brand/'.$ImgArr[0]->image);
             }
          }
         $image = $request->file('image');
         $ext = $image->extension();
         $image_name = time().'.'.$ext;
         $image->storeAs('/public/media/brand',$image_name);
         $model->image = $image_name;
       }
       $model->is_show_home = $request->post('is_show_home');
       $model->name = $request->post('name');
       $model->status = 1;
       $model->save();
       $request->session()->flash('message',$msg);
       return redirect('/admins/brand');
     }
     public function delete(Request $request,$id)
     {
       $result = Brand::find($id);
       $result->delete();
       $request->session()->flash('message','Brand Deleted Successfully');
       return redirect('/admins/brand');
     }
     public function manage_brand_status(Request $request,$status,$id)
     {

       $result = Brand::find($id);
       $result->status = $status;
       $result->save();
       $request->session()->flash('message','Brand Status Updated');
       return redirect('/admins/brand');
     }
}
