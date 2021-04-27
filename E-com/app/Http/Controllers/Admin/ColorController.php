<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
       $result['data'] = Color::all();
         return view('admins.color',$result);
     }
     public function manage_color($id='')
     {
       if($id>0){
         $arr = Color::where('id',$id)->get();
         $result['color'] = $arr['0']['color'];
         $result['id'] = $arr['0']['id'];
       }else{
         $result['color'] = '';
         $result['id'] = 0;
       }
       return view('admins.manage_color',$result);
     }
     public function manage_color_process(Request $request)
     {
       //return $request->post();
       $request->validate([
         'color'=>'required',
         ]);
       if($request->post('id') > 0){
         $model =Color::find($request->post('id'));
         $msg = "Color Updated Successfully";
       }else{
         $model = new Color;
         $msg = "Color Inserted Successfully";
       }
       $model->color = $request->post('color');
       $model->status = 1;
       $model->save();
       $request->session()->flash('message',$msg);
       return redirect('/admins/color');
     }
     public function delete(Request $request,$id)
     {
       $result = Color::find($id);
       $result->delete();
       $request->session()->flash('message','Color Deleted Successfully');
       return redirect('/admins/color');
     }
     public function manage_color_status(Request $request,$status,$id)
     {

       $result = Color::find($id);
       $result->status = $status;
       $result->save();
       $request->session()->flash('message','Color Status Updated');
       return redirect('/admins/color');
     }
}
