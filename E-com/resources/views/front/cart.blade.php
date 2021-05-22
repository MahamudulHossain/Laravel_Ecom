@extends('front.layout')

@section('title','My Cart')

@section('content')

<section id="cart-view">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table">
             <form action="">
               <div class="table-responsive">
                 @if(isset($list[0]))
                  <table class="table">
                    <thead>
                      <tr>
                        <th></th>
                        <th></th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($list as $data)
                      <tr id="pro_box{{$data->pro_attr_id}}">
                        <td><a class="remove" href="javascript:void(0)" onclick="deleteCart('{{$data->pid}}','{{$data->pro_attr_id}}','{{$data->size}}','{{$data->color}}')"><fa class="fa fa-close"></fa></a></td>
                        <td><a href="product/{{$data->slug}}"><img src="{{asset('storage/media/'.$data->attr_image)}}" alt="img"></a></td>
                        <td><a class="aa-cart-title" href="product/{{$data->slug}}">{{$data->name}}</a>
                        @if($data->size != '')
                        <br>Size : {{$data->size}}
                        @endif
                        @if($data->color != '')
                        <br>Color : {{$data->color}}
                        @endif
                        </td>
                        <td>{{$data->price}} Tk.</td>
                        <td>
                          <input id="qty{{$data->pro_attr_id}}" class="aa-cart-quantity" type="number" value="{{$data->qty}}" onchange="updateQty('{{$data->pid}}','{{$data->pro_attr_id}}','{{$data->size}}','{{$data->color}}','{{$data->price}}')">
                        </td>
                        <td id="total_price{{$data->pro_attr_id}}">{{$data->qty * $data->price}} Tk.</td>
                      </tr>
                      @endforeach
                      </tbody>
                  </table>
                  @else
                   <h2>Cart is empty!!</h2>
                  @endif
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
