@extends('admins.layout')

@section('title','Reviews')
@section('reviews_active','active')
@section('content')
<div class="row">
  <div class="col-lg-12">
  <h2>Reviews</h2>
  </div>
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
                    <th>Product</th>
                    <th>Customar Name</th>
                    <th>Rating</th>
                    <th>Reviews</th>
                    <th>Added On</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
              @foreach($data as $list)
                <tr>
                    <td>{{$list->id}}</td>
                    <td>{{$list->name}}</td>
                    <td>{{$list->cusnam}}</td>
                    <td>{{$list->rating}}</td>
                    <td>{{$list->review}}</td>
                    <td>{{customDate($list->added_on)}}</td>
                    <td>

                       @if($list->status == 1)
                      <a href="{{url('admins/reviews/manage_reviews/0')}}/{{$list->id}}"><button class="btn btn-sm btn-primary">Active</button></a>
                      @elseif ($list->status == 0)
                      <a href="{{url('admins/reviews/manage_reviews/1')}}/{{$list->id}}"><button class="btn btn-sm btn-warning">Deactive</button></a>
                      @endif

                      <a href="{{url('admins/reviews/delete')}}/{{$list->id}}"><button class="btn btn-sm btn-danger">Delete</button></a>

                    </td>
                </tr>
              @endforeach
            </tbody>
        </table>
    </div>
  </div>


</div>
@endsection
