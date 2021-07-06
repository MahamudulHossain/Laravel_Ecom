@extends('front.layout')

@section('title','Order Placed')

@section('content')

<!-- Cart view section -->
<section id="checkout">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
       <div class="checkout-area">
         <h2>Congrats! Your Order Has Been Placed...</h2>
         <h2>ORDER ID: {{session()->get('ORDER_ID')}}</h2>
         {{session()->forget('ORDER_ID')}}
        </div>
      </div>
    </div>
  </div>
</section>
<!-- / Cart view section -->
</div>
@endsection
