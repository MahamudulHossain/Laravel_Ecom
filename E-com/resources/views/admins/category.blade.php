@extends('admins.layout')

@section('title','Category')
@section('category_active','active')

@section('content')
<div class="row">
  <div class="col-lg-12">
  <h2>Category</h2>
    <a href="{{url('admins/category/manage_category')}}">
      <button type="button" name="button" class="btn btn-success btn-sm mt-2">Add Category</button>
    </a>
  </div>
  <div class="col-lg-12 mt-3">
    @if(session()->has('message'))
    <div class="col-lg-12 mt-3">
        <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
          <span class="badge badge-pill badge-primary">Success</span>
          {{session('message')}}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
    @endif 
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
                      <a href="{{url('admins/category/manage_category')}}/{{$list->id}}"><button class="btn btn-sm btn-info">Edit</button></a>

                      @if($list->status == 1)
                      <a href="{{url('admins/category/manage_category/status/0')}}/{{$list->id}}"><button class="btn btn-sm btn-primary">Active</button></a>
                      @elseif ($list->status == 0)
                      <a href="{{url('admins/category/manage_category/status/1')}}/{{$list->id}}"><button class="btn btn-sm btn-warning">Deactive</button></a>
                      @endif

                      <a href="{{url('admins/category/delete')}}/{{$list->id}}"><button class="btn btn-sm btn-danger">Delete</button></a>
                    </td>
                </tr>
              @endforeach
            </tbody>
        </table>
    </div>
  </div>


</div>
@endsection
