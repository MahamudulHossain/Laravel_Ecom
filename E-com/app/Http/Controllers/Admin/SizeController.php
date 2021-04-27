<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
       $result['data'] = Size::all();
         return view('admins.size',$result);
     }
     public function manage_size($id='')
     {
       if($id>0){
         $arr = Size::where('id',$id)->get();
         $result['size'] = $arr['0']['size'];
         $result['id'] = $arr['0']['id'];
       }else{
         $result['size'] = '';
         $result['id'] = 0;
       }
       return view('admins.manage_size',$result);
     }
     public function manage_size_process(Request $request)
     {
       //return $request->post();
       $request->validate([
         'size'=>'required|unique:sizes',
         ]);
       if($request->post('id') > 0){
         $model =Size::find($request->post('id'));
         $msg = "Size Updated Successfully";
       }else{
         $model = new Size;
         $msg = "Size Inserted Successfully";
       }
       $model->size = $request->post('size');
       $model->status = 1;
       $model->save();
       $request->session()->flash('message',$msg);
       return redirect('/admins/size');
     }
     public function delete(Request $request,$id)
     {
       $result = Size::find($id);
       $result->delete();
       $request->session()->flash('message','Size Deleted Successfully');
       return redirect('/admins/size');
     }
     public function manage_size_status(Request $request,$status,$id)
     {

       $result = Size::find($id);
       $result->status = $status;
       $result->save();
       $request->session()->flash('message','Size Status Updated');
       return redirect('/admins/size');
     }
}
