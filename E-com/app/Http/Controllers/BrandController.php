<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

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
         $result['id'] = $arr['0']['id'];
       }else{
         $result['name'] = '';
         $result['image'] = '';
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
         $image = $request->file('image');
         $ext = $image->extension();
         $image_name = time().'.'.$ext;
         $image->storeAs('/public/media/brand',$image_name);
         $model->image = $image_name;
       }
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
