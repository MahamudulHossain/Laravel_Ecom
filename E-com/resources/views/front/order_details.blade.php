@extends('front.layout')

@section('title','Order detail')

@section('content')

<section id="cart-view">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="order_detail">
             <h2>Delivary Address</h2>
             {{$data[0]->address}}<br>
             {{$data[0]->city}}<br>
             Email: {{$data[0]->email}}<br>
             Mobile: {{$data[0]->mobile}}
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
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($data as $list)
                        <tr>
                          <td>{{$list->name}}<br>
                              {{$list->size}}<br>
                              {{$list->color}}
                          </td>
                          <td><img src="{{asset('storage/media/'.$list->attr_image)}}" alt="img"></td>
                          <td>{{$list->price}}/-</td>
                          <td>{{$list->qty}}</td>
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
