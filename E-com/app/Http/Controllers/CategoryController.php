<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $result['data'] = Category::all();
        return view('admins.category',$result);
    }
    public function manage_category($id='')
    {
      if($id>0){
        $result['category'] = DB::table('categories')->where(['status'=>'1'])->where('id','!=',$id)->get();
        $arr = Category::where('id',$id)->get();
        $result['category_name'] = $arr['0']['category_name'];
        $result['category_slug'] = $arr['0']['category_slug'];
        $result['parent_category_id'] = $arr['0']['parent_category_id'];
        $result['category_image'] = $arr['0']['category_image'];
        $result['id'] = $arr['0']['id'];
      }else{
        $result['category'] = DB::table('categories')->where(['status'=>'1'])->get();
        $result['category_name'] = '';
        $result['category_slug'] = '';
        $result['parent_category_id'] = '';
        $result['category_image'] = '';
        $result['id'] = 0;
      }
      return view('admins.manage_category',$result);
    }
    public function manage_category_process(Request $request)
    {
      //return $request->post();
      $request->validate([
        'category_name'=>'required',
        'category_image'=>'mimes:jpeg,jpg,png',
        'category_slug'=>'required|unique:categories,category_slug,'.$request->post('id')
        //Checking slug when inserting (unique:categories) but when updating (,category_slug,'.$request->post('id'))
      ]);
      if($request->post('id') > 0){
        $model =Category::find($request->post('id'));
        $msg = "Category Updated Successfully";
      }else{
        $model = new Category;
        $msg = "Category Inserted Successfully";
        $model -> status ='1';
      }
      $model->category_name = $request->post('category_name');
      $model->category_slug = $request->post('category_slug');
      $model->parent_category_id = $request->post('parent_category_id');
      if($request->hasfile('category_image')){
        $image = $request->file('category_image');
        $ext = $image->extension();
        $image_name = time().'.'.$ext;
        $image->storeAs('/public/media/category/',$image_name);
        $model->category_image = $image_name;
      }
      $model->save();
      $request->session()->flash('message',$msg);
      return redirect('/admins/category');
    }
    public function delete(Request $request,$id)
    {
      $result = Category::find($id);
      $result->delete();
      $request->session()->flash('message','Category Deleted Successfully');
      return redirect('/admins/category');
    }
    public function manage_category_status(Request $request,$status,$id)
    {

      $result = Category::find($id);
      $result->status = $status;
      $result->save();
      $request->session()->flash('message','Category Status Updated');
      return redirect('/admins/category');
    }

}
