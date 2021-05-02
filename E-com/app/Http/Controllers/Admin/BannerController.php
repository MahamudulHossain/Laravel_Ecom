<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Storage;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
       $result['data'] = Banner::all();
         return view('admins.banner',$result);
     }
     public function manage_banner($id='')
     {
       if($id>0){
         $arr = Banner::where('id',$id)->get();
         $result['image'] = $arr['0']['image'];
         $result['id'] = $arr['0']['id'];
       }else{
         $result['image'] = '';
         $result['id'] = 0;
       }
       return view('admins.manage_banner',$result);
     }
     public function manage_banner_process(Request $request)
     {
       if($request->post('id') > 0){
         $image_validation = 'mimes:jpeg,jpg,png';
       }else{
         $image_validation = 'required|mimes:jpeg,jpg,png';
       }
       //return $request->post();
       $request->validate([
         'image'=>$image_validation
         ]);
       if($request->post('id') > 0){
         $model =Banner::find($request->post('id'));
         $msg = "Banner Updated Successfully";
       }else{
         $model = new Banner;
         $msg = "Banner Inserted Successfully";
       }
       if($request->hasfile('image')){
         if($request->post('id')>0){
             $ImgArr = DB::table('banners')->where('id', $request->post('id'))->get();
             // echo '<pre>';
             // print_r($ImgArr[0]->image);
             // die();
             if(Storage::exists('/public/media/banner/'.$ImgArr[0]->image)){
               Storage::delete('/public/media/banner/'.$ImgArr[0]->image);
             }
          }
         $image = $request->file('image');
         $ext = $image->extension();
         $image_name = time().'.'.$ext;
         $image->storeAs('/public/media/banner',$image_name);
         $model->image = $image_name;
       }
       $model->status = 1;
       $model->save();
       $request->session()->flash('message',$msg);
       return redirect('/admins/banner');
     }
     public function delete(Request $request,$id)
     {
       $result = Banner::find($id);
       $result->delete();
       $request->session()->flash('message','Banner Deleted Successfully');
       return redirect('/admins/banner');
     }
     public function manage_banner_status(Request $request,$status,$id)
     {

       $result = Banner::find($id);
       $result->status = $status;
       $result->save();
       $request->session()->flash('message','Banner Status Updated');
       return redirect('/admins/banner');
     }
}
