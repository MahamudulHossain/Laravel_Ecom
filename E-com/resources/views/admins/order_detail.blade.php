@extends('admins.layout')

@section('title','Order Detail')
@section('order_active','active')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="cart-view-area">
      <div class="row">
          <div  class="col-md-6">
            <h2>Delivary Details</h2>
            Name : {{$data[0]->customar}}<br>
            Email: {{$data[0]->email}}<br>
            Mobile: {{$data[0]->mobile}}<br>
            Address : {{$data[0]->address}} - {{$data[0]->city}}
          </div>
          <div class="col-md-6 order_status">
            <h2>Order Status</h2>
            Payment Type : {{$data[0]->payment_type}}<br>
            Status : {{$data[0]->status}}
          </div>
      </div>
      <div class="cart-view-table">
        <form action="">
          <div class="table-responsive">
             <table class="table">
               <thead>
                 <tr>
                   <th>Product</th>
                   <th>Image</th>
                   <th>Price</th>
                   <th>Quantity</th>
                   <th>Total</th>
                 </tr>
               </thead>
               <tbody>
                 <?php $tot=0;?>
                 @foreach($data as $list)
                   <tr>
                     <td>{{$list->name}}<br>
                         SIZE : {{$list->size}}<br>
                         COLOR : {{$list->color}}
                     </td>
                     <td><img src="{{asset('storage/media/'.$list->attr_image)}}" alt="img" class="admin_img"></td>
                     <td>{{$list->price}}/-</td>
                     <td>{{$list->qty}}</td>
                     <td>{{$list->qty*$list->price}}/-</td>
                     <?php $tot=$tot+($list->qty*$list->price);?>
                   </tr>
                 @endforeach
                 <tr>
                   <td colspan="2">&nbsp;</td>
                   <td colspan="2"><h5>Sub Total</h5></td>
                   <td>{{$tot}}/-</td>
                 </tr>
                 <tr>
                   <td colspan="2">&nbsp;</td>
                   <td colspan="2"><h5>Coupon</h5></td>
                   <td>{{$data[0]->coupon_code}}</td>
                 </tr>
                 <tr>
                   <td colspan="2">&nbsp;</td>
                   <td colspan="2"><h5>Final Pay</h5></td>
                   <td>{{$data[0]->total_amt}}/-</td>
                 </tr>
               </tbody>
             </table>
           </div>
        </form>
      </div>
    </div>
  </div>



</div>
@endsection
