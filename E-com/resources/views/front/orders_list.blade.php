@extends('front.layout')

@section('title','My Orders')

@section('content')

<section id="cart-view">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table">
             <form action="">
               <div class="table-responsive">
                  <table class="table">
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
                          <td class="order_link"><a href="{{url('order_details')}}/{{$list->id}}">{{$list->id}}</a></td>
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
             </form>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 <input type="hidden" id="qty"/>
 <form id="addTocartFrm">
   @csrf
   <input type="hidden" id="size_id" name="size_id" />
   <input type="hidden" id="color_id" name="color_id" />
   <input type="hidden" id="pro_qty" name="pro_qty"/>
   <input type="hidden" id="product_id" name="product_id"/>
 </form>
@endsection
