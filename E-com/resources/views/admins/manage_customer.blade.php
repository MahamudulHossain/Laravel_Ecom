@extends('admins.layout')

@section('title','Customer Details')

@section('content')
<div class="row">
  <div class="col-lg-9">
  <h2>Customer Details</h2>
    <a href="{{url('admins/customer')}}">
      <button type="button" name="button" class="btn btn-info btn-sm mt-2">Back</button>
    </a>
  </div>
  <div class="col-lg-12 mt-2">
          <div class="table-responsive table--no-card m-b-30 mt-2">
              <table class="table table-borderless table-striped table-earning">
              <tr>
                <td><strong>Name</strong></td>
                <td>{{$name}}</td>
              </tr>
              <tr>
                <td><strong>Email</strong></td>
                <td>{{$email}}</td>
              </tr>
              <tr>
                <td><strong>Address</strong></td>
                <td>{{$address}}</td>
              </tr>
              <tr>
                <td><strong>City</strong></td>
                <td>{{$city}}</td>
              </tr>
              <tr>
                <td><strong>Phone</strong></td>
                <td>{{$phone}}</td>
              </tr>
              <tr>
                <td><strong>Created At</strong></td>
                <td>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$created_at)->format('Y-m-d h:i')}}</td>
              </tr>
              <tr>
                <td><strong>Updated At</strong></td>
                <td>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$updated_at)->format('Y-m-d h:i')}}</td>
              </tr>
            </table>
          </div>
</div>
</div>
@endsection
