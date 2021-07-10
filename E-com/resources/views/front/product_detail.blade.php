@extends('front.layout')

@section('title',$product_detail[0]->name)

@section('content')

<section id="aa-product-details">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="aa-product-details-area">
          <div class="aa-product-details-content">
            <div class="row">
              <!-- Modal view slider -->
              <div class="col-md-5 col-sm-5 col-xs-12">
                <div class="aa-product-view-slider">
                  <div id="demo-1" class="simpleLens-gallery-container">
                    <div class="simpleLens-container">
                      <div class="simpleLens-big-image-container"><a data-lens-image="{{asset('storage/media/'.$product_detail[0]->image)}}" class="simpleLens-lens-image"><img src="{{asset('storage/media/'.$product_detail[0]->image)}}" class="simpleLens-big-image"></a></div>
                    </div>
                    <div class="simpleLens-thumbnails-container">
                      <a data-big-image="{{asset('storage/media/'.$product_detail[0]->image)}}" data-lens-image="{{asset('storage/media/'.$product_detail[0]->image)}}" class="simpleLens-thumbnail-wrapper" href="javascript:void(0)">
                        <img src="{{asset('storage/media/'.$product_detail[0]->image)}}" width="50px">
                      </a>
                      @if(isset($product_detail_images[$product_detail[0]->id][0]))
                        @foreach($product_detail_images[$product_detail[0]->id] as $list)
                        <a data-big-image="{{asset('storage/media/'.$list->images)}}" data-lens-image="{{asset('storage/media/'.$list->images)}}" class="simpleLens-thumbnail-wrapper" href="javascript:void(0)">
                          <img src="{{asset('storage/media/'.$list->images)}}" width="50px">
                        </a>
                        @endforeach
                      @endif
                    </div>
                  </div>
                </div>
              </div>
              <!-- Modal view content -->
              <div class="col-md-7 col-sm-7 col-xs-12">
                <div class="aa-product-view-content">
                  <h3>{{$product_detail[0]->name}}</h3>
                  @if($product_detail[0]->lead_time != '')
                    <span class="pro_style">Will be available in {{$product_detail[0]->lead_time}}</span>
                  @endif
                  <div class="aa-price-block pro_detail_price">
                    <span class="aa-product-view-price">Tk. {{$product_detail_attr[$product_detail[0]->id][0]->price}}/-</span>
                    <span class="aa-product-view-price"><del>Tk. {{$product_detail_attr[$product_detail[0]->id][0]->mrp}}/-</del></span>
                  </div>
                  <p>{!!$product_detail[0]->short_desc!!}</p>

                  @if($product_detail_attr[$product_detail[0]->id][0]->size_id > 0)
                      <h4>Size</h4>
                      <div class="aa-prod-view-size">
                        @foreach($product_detail_attr[$product_detail[0]->id] as $attr)
                          @if($attr->size !='')
                          <?php
                            $sizeArr[] = $attr->size;
                            $UniqueArr = array_unique($sizeArr);
                          ?>
                          @endif
                        @endforeach
                        @foreach($UniqueArr as $attr)
                          @if($attr !='')
                          <a href="javascript:void(0)" class="pro_size pro_size_{{$attr}}" onclick="show_product('{{$attr}}')">{{$attr}}</a>
                          @endif
                        @endforeach
                      </div>
                  @endif

                  @if($product_detail_attr[$product_detail[0]->id][0]->color_id > 0)
                      <h4>Color</h4>
                      <div class="aa-color-tag">
                        @foreach($product_detail_attr[$product_detail[0]->id] as $attr)
                          @if($attr->color !='')
                          <?php
                          $col='';
                            $col = strtolower($attr->color);
                          ?>
                          <a href="javascript:void(0)" class="aa-color-{{$col}} size_{{$attr->size}} hide_color"  onclick=show_color_image("{{asset('storage/media/'.$attr->attr_image)}}","{{$col}}")></a>
                          @endif
                        @endforeach
                      </div>
                  @endif

                  <div class="aa-prod-quantity">
                    <form action="">
                      <select id="qty" name="qty">
                        @for($i=1;$i<11;$i++)
                        <option value="{{$i}}">{{$i}}</option>
                        @endfor
                      </select>
                    </form>
                    <p class="aa-prod-category">
                      Model: <a href="javascript:void(0)">{{$product_detail[0]->model}}</a>
                    </p>
                  </div>
                  <div class="aa-prod-view-bottom">
                    <a class="aa-add-to-cart-btn" href="javascript:void(0)" onclick="add_to_cart('{{$product_detail[0]->id}}','{{$product_detail_attr[$product_detail[0]->id][0]->size_id}}','{{$product_detail_attr[$product_detail[0]->id][0]->color_id}}')">Add To Cart</a>
                  </div>
                  <div class="addToCartMsg mt-10"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="aa-product-details-bottom">
            <ul class="nav nav-tabs" id="myTab2">
              <li><a href="#description" data-toggle="tab">Description</a></li>
              <li><a href="#review" data-toggle="tab">Reviews</a></li>
              @if($product_detail[0]->technical_specification != '')
              <li><a href="#techSpc" data-toggle="tab">Technical Specification</a></li>
              @endif
              @if($product_detail[0]->warrenty != '')
              <li><a href="#warrenty" data-toggle="tab">Warrenty</a></li>
              @endif
              @if($product_detail[0]->uses != '')
              <li><a href="#uses" data-toggle="tab">Uses</a></li>
              @endif
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
              <div class="tab-pane fade in active" id="description">
                {!!$product_detail[0]->desc!!}
              </div>
              <div class="tab-pane fade " id="review">
               <div class="aa-product-review-area">
                @if(isset($review[0]))
                 <h4>{{count($review)}} Review(s) for {{$review[0]->name}}</h4>
                   <ul class="aa-review-nav">
                     @foreach($review as $list)
                      <li>
                        <div class="media">
                          <div class="media-body">
                            <h4 class="media-heading"><strong>{{$list->cusnam}}</strong> - <span>{{customDate($list->added_on)}}</span></h4>
                            <div class="aa-product-rating">
                              <span>{{$list->rating}}</span>
                            </div>
                            <p>{{$list->review}}</p>
                          </div>
                        </div>
                      </li>
                      @endforeach
                   </ul>
                @else
                  <h4 class="red">No Review So Far!!</h4>
                @endif
                 <h4>Add a review</h4>
                 <form id="frmReview" class="aa-review-form">
                     <div class="aa-your-rating">
                       <label for="message">Your Rating</label>
                       <select class="form-control" name="rating" required>
                         <option value="">Select your rating</option>
                         <option>Not Satisfied</option>
                         <option>Fair</option>
                         <option>Good</option>
                         <option>Excellent</option>
                       </select>
                     </div>
                     <div class="form-group">
                        <label for="message">Your Review</label>
                        <textarea class="form-control" rows="3" name="review" required></textarea>
                     </div>
                     <input type="hidden" name="product_id" value="{{$product_detail[0]->id}}">
                     <button type="submit" class="btn btn-default aa-review-submit">Submit</button>
                     @csrf
                 </form>
               </div>
               <div class="review_msg"></div>
              </div>
              <!-- technical_specification -->
              <div class="techWrnUs tab-pane fade " id="techSpc">
                {!!$product_detail[0]->technical_specification!!}
              </div>
              <div class="techWrnUs tab-pane fade " id="warrenty">
                <h3>{{$product_detail[0]->warrenty}}</h3>
              </div>
              <div class="techWrnUs tab-pane fade " id="uses">
                <h3>{{$product_detail[0]->uses}}</h3>
              </div>
            </div>
          </div>
          <!-- Related product -->
          <div class="aa-product-related-item">
            <h3>Related Products</h3>
            <ul class="aa-product-catg aa-related-item-slider">

              @if(isset($related_products[0]))
              @foreach($related_products as $productArr)
                <li>
                  <figure>
                    <a class="aa-product-img" href="{{$productArr->slug}}"><img src="{{asset('storage/media/'.$productArr->image)}}" alt="{{$productArr->slug}}" width='200px' height='300px' ></a>
                    <a class="aa-add-card-btn" href="{{$productArr->slug}}"><span class="fa fa-shopping-cart"></span>Shop Now</a>
                    <figcaption>
                      <h4 class="aa-product-title"><a href="{{$productArr->slug}}">{{$productArr->name}}</a></h4>
                      <span class="aa-product-price">TK. {{$related_products_attr[$productArr->id][0]->price}}/-</span><span class="aa-product-price"><del>TK. {{$related_products_attr[$productArr->id][0]->mrp}}/-</del></span>

                    </figcaption>
                  </figure>
                </li>
              @endforeach
              @else
              <li>
                <figure>
                    <h4>No Product Found</h4>
                </figure>
              </li>
              @endif

            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <input type="hidden" id="qty"/>
  <form id="addTocartFrm">
    @csrf
    <input type="hidden" id="size_id" name="size_id"/>
    <input type="hidden" id="color_id" name="color_id"/>
    <input type="hidden" id="pro_qty" name="pro_qty"/>
    <input type="hidden" id="product_id" name="product_id"/>
  </form>


  <!-- Login Modal -->
  <?php

    if(isset($_COOKIE['USER_EMAIL']) && isset($_COOKIE['USER_PASSWORD'])){
      $userEmail = $_COOKIE['USER_EMAIL'];
      $userPwd = $_COOKIE['USER_PASSWORD'];
      $is_rememberme = "checked='checked'";
    }else{
      $userEmail = '';
      $userPwd = '';
      $is_rememberme = '';
    }

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
  
</section>


@endsection
