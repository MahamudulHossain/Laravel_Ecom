@extends('front.layout')

@section('title','Checkout')

@section('content')

<!-- Cart view section -->
<section id="checkout">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
       <div class="checkout-area">
         <form action="" id="orderFrm">
           <div class="row">
             <div class="col-md-8">
               <div class="checkout-left">
                 <div class="panel-group" id="accordion">
                   @if(!isset($user_info[0]))
                   <div class="panel-body">
                         <input type="button" value="Login" class="aa-browse-btn" data-toggle="modal" data-target="#login-modal"></a><br><br>
                   </div>
                   @else
                   <div class="panel panel-default aa-checkout-billaddress">
                     <div class="panel-heading">
                       <h4 class="panel-title">
                           Shippping Address
                       </h4>
                     </div>
                       <div class="panel-body">
                        <div class="row">
                           <div class="col-md-12">
                             <div class="aa-checkout-single-bill">
                               <input type="text" placeholder="Name*" name="name" value="{{$user_info[0]->name}}" required>
                             </div>
                           </div>
                         </div>
                         <div class="row">
                           <div class="col-md-4">
                             <div class="aa-checkout-single-bill">
                               <input type="email" placeholder="Email Address*" name="email" value="{{$user_info[0]->email}}" required>
                             </div>
                           </div>
                           <div class="col-md-4">
                             <div class="aa-checkout-single-bill">
                               <input type="text" placeholder="Mobile*"name="mobile" value="{{$user_info[0]->mobile}}" required>
                             </div>
                           </div>
                           <div class="col-md-4">
                             <div class="aa-checkout-single-bill">
                               <input type="text" placeholder="City*" name="city" required>
                             </div>
                           </div>
                         </div>
                         <div class="row">
                           <div class="col-md-12">
                             <div class="aa-checkout-single-bill">
                               <textarea cols="8" rows="3" name="address" placeholder="Address*" required>{{$user_info[0]->address}}</textarea>
                             </div>
                           </div>
                         </div>
                       </div>
                       @endif
                   </div>
                 </div>
               </div>
             </div>
             <div class="col-md-4">
               <div class="checkout-right">
                 <h4>Order Summary</h4>
                 <div class="aa-order-summary-area">
                   <table class="table table-responsive">
                     <thead>
                       <tr>
                         <th>Product</th>
                         <th>Total</th>
                       </tr>
                     </thead>
                     <tbody>
                       <?php $total = 0;?>
                      @foreach($cart_items as $list)
                      <?php $total = $total + ($list->qty * $list->price);?>
                       <tr>
                         <td>{{$list->name}} <br>(<span class="pro_at">{{$list->size}},{{$list->color}}</span>)<strong> x  {{$list->qty}}</strong>
                         </td>
                         <td>{{$list->qty * $list->price}}/-</td>
                       </tr>
                      @endforeach
                     </tbody>
                     <tfoot>
                       <tr class="hide" id="coupon_row">
                         <th>Coupon</th>
                         <td id="coupon_name"></td>
                       </tr>
                        <tr>
                         <th>Total</th>
                         <td id="final_total">{{$total}}/-</td>
                       </tr>
                     </tfoot>
                   </table>
                 </div>
         <!-- Coupon section -->
                   <div class="panel panel-default aa-checkout-coupon">
                     <div class="panel-heading">
                       <h4 class="panel-title">
                         <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                           Have a Coupon?
                         </a>
                       </h4>
                     </div>
                     <div id="collapseOne" class="panel-collapse collapse in">
                       <div class="panel-body">
                         <form method="post">
                           <input type="text" placeholder="Coupon Code" class="aa-coupon-code" name="coupon_code" id="coupon_Code">
                           <input type="button" value="Apply Coupon" class="aa-browse-btn" onclick="apply_coupon_code()">
                           @csrf
                         </form>
                         <div id="coupon_msg"></div>
                       </div>
                     </div>
                   </div>
       <!-- Coupon section End-->
                 <h4>Payment Method</h4>
                 <div class="aa-payment-method">
                   <label for="cashdelivery"><input type="radio" id="cashdelivery" name="optionsRadios" value="COD" checked> Cash on Delivery </label>
                   <label for="paypal"><input type="radio" id="paypal" name="optionsRadios" value="PAYPAL" disabled> Via Paypal </label>
                   <input type="submit" value="Place Order" class="aa-browse-btn" id="orderBtn">
                 </div>
               </div>
               <div id="order_msg"></div>
             </div>
           </div>
           @csrf
         </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- / Cart view section -->
<?php
$userEmail='';
$userPwd='';
$is_rememberme='';
?>
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4>Login or Register</h4>
        <form class="aa-login-form" action="" id="loginFrm">
          <label for="">Email address<span>*</span></label>
          <input type="email" placeholder="Email" name="user_email" value="{{$userEmail}}" required>
          <div id="email_err" class="login_msg"></div>
          <label for="">Password<span>*</span></label>
          <input type="password" placeholder="Password" name="user_password" value="{{$userPwd}}" required>
          <div id="pwd_err" class="login_msg"></div>
          <button class="aa-browse-btn" type="submit" id="loginBtn">Login</button>
          @csrf
          <label for="rememberme" class="rememberme"><input type="checkbox" id="rememberme" Name="rememberme" {{$is_rememberme}}> Remember me </label>
          <p class="aa-lost-password"><a href="#">Lost your password?</a></p>
          <div class="aa-register-now">
            Don't have an account?<a href="{{url('registration')}}">Register now!</a>
          </div>
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
@endsection
