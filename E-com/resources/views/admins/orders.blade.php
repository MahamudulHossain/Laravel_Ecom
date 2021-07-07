@extends('admins.layout')

@section('title','Orders')
@section('order_active','active')
@section('content')
<div class="row">
  <div class="col-lg-12">
  <h2>Order List</h2>
  </div>
    <div class="table-responsive table--no-card m-b-30 mt-2">
        <table class="table table-borderless table-striped table-earning">
            <thead>
              <tr>
                <th>Order ID</th>
                <th>Order Status</th>
                <th>Coupon Code</th>
                <th>Payment Status</th>
                <th>Total Amount</th>
                <th>Orderd At</th>
              </tr>
            </thead>
            <tbody>
              @foreach($data as $list)
                <tr>
                  <td class="order_link"><a href="{{url('admins/order_details')}}/{{$list->id}}">{{$list->id}}</a></td>
                  <td>{{$list->status}}</td>
                  <td>{{$list->coupon_code}} ( {{$list->coupon_value}}/- )</td>
                  <td>{{$list->payment_status}}</td>
                  <td>{{$list->total_amt}}/-</td>
                  <td>{{$list->added_on}}</td>
                </tr>
              @endforeach
            </tbody>
        </table>
    </div>
  </div>


</div>
@endsection
