@extends('admins.layout')

@section('title','Customer')
@section('customer_active','active')
@section('content')
<div class="row">
  <div class="col-lg-12">
  <h2>Customer List</h2>
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
                    <th>Customer Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
              @foreach($data as $list)
                <tr>
                    <td>{{$list->id}}</td>
                    <td>{{$list->name}}</td>
                    <td>
                      <a href="{{url('admins/customer/show_customer')}}/{{$list->id}}"><button class="btn btn-sm btn-success">&nbsp;&nbsp;Show &nbsp;&nbsp;</button></a>

                      @if($list->status == 1)
                      <a href="{{url('admins/customer/manage_customer/status/0')}}/{{$list->id}}"><button class="btn btn-sm btn-primary">Active</button></a>
                      @elseif ($list->status == 0)
                      <a href="{{url('admins/customer/manage_customer/status/1')}}/{{$list->id}}"><button class="btn btn-sm btn-warning">Deactive</button></a>
                      @endif
                    </td>
                </tr>
              @endforeach
            </tbody>
        </table>
    </div>
  </div>


</div>
@endsection
