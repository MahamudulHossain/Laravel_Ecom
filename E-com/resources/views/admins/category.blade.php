@extends('admins.layout')

@section('title','Category')

@section('content')
<div class="row">
  <div class="col-lg-12">
  <h2>Category</h2>
    <a href="{{url('admins/category/manage_category')}}">
      <button type="button" name="button" class="btn btn-success btn-sm mt-2">Add Category</button>
    </a>
  </div>
  <div class="col-lg-12 mt-3">
      <b>{{session('message')}}</b>
    <div class="table-responsive table--no-card m-b-30 mt-2">
        <table class="table table-borderless table-striped table-earning">
            <thead>
                <tr>
                    <th>Serial No.</th>
                    <th>Category Name</th>
                    <th>Category Slug</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
              @foreach($data as $list)
                <tr>
                    <td>{{$list->id}}</td>
                    <td>{{$list->category_name}}</td>
                    <td>{{$list->category_slug}}</td>
                    <td>
                      <a href="{{url('admins/category/delete')}}/{{$list->id}}"><button class="btn btn-sm btn-danger">Delete</button></a>
                      <a href="{{url('admins/category/manage_category')}}/{{$list->id}}"><button class="btn btn-sm btn-info">&nbsp;&nbsp;Edit&nbsp;&nbsp;</button></a>
                    </td>
                </tr>
              @endforeach
            </tbody>
        </table>
    </div>
  </div>


</div>
@endsection
