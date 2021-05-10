@extends('front.layout')

@section('title','Daily Shop | Home')

@section('content')

<!-- Start slider -->
<section id="aa-slider">
  <div class="aa-slider-area">
    <div id="sequence" class="seq">
      <div class="seq-screen">
        <ul class="seq-canvas">
          <!-- single slide item -->
          @foreach($home_banner as $list)
          <li>
            <div class="seq-model">
              <img data-seq src="{{asset('storage/media/banner/'.$list->image)}}" alt="Banner Image" />
            </div>
          </li>
          @endforeach
        </ul>
      </div>
      <!-- slider navigation btn -->
      <fieldset class="seq-nav" aria-controls="sequence" aria-label="Slider buttons">
        <a type="button" class="seq-prev" aria-label="Previous"><span class="fa fa-angle-left"></span></a>
        <a type="button" class="seq-next" aria-label="Next"><span class="fa fa-angle-right"></span></a>
      </fieldset>
    </div>
  </div>
</section>
<!-- / slider -->
<!-- Start Promo section -->
<section id="aa-promo">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="aa-promo-area">
          <div class="row">
            <!-- promo left -->
            @foreach($home_category as $list)
            <div class="col-md-4 no-padding">
              <div class="aa-promo-left">
                <div class="aa-promo-banner">
                  <img src="{{asset('storage/media/category/'.$list->category_image)}}" alt="img">
                  <div class="aa-prom-content">
                    <h4><a href="{{url('category/'.$list->category_name)}}">{{$list->category_name}}</a></h4>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- / Promo section -->
<!-- Products section -->
<section id="aa-product">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <div class="aa-product-area">
            <div class="aa-product-inner">
              <!-- start prduct navigation -->
               <ul class="nav nav-tabs aa-products-tab">
                @foreach($home_category as $list)
                  <li class=""><a href="#cat_{{$list->id}}" data-toggle="tab">{{$list->category_name}}</a></li>
                @endforeach
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                  <?php $loop_count = 1;?>
                @foreach($home_category as $list)
                <?php
                $active = "";
                if($loop_count == 1){
                  $active = "in active";
                  $loop_count++;
                }
                ?>
                  <div class="tab-pane fade {{$active}}" id="cat_{{$list->id}}">
                    <ul class="aa-product-catg">
                      <!-- start single product item -->
                      @if(isset($home_category_product[$list->id][0]))
                      @foreach($home_category_product[$list->id] as $productArr)
                      <li>
                        <figure>
                          <a class="aa-product-img" href="product/{{$productArr->slug}}"><img src="{{asset('storage/media/'.$productArr->image)}}" alt="{{$productArr->slug}}" width="200px" height="300px"></a>
                          <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                          <figcaption>
                            <h4 class="aa-product-title"><a href="product/{{$productArr->slug}}">{{$productArr->name}}</a></h4>
                            <span class="aa-product-price">TK. {{$home_category_product_attr[$productArr->id][0]->price}}/-</span><span class="aa-product-price"><del>TK. {{$home_category_product_attr[$productArr->id][0]->mrp}}/-</del></span>
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
                  @endforeach
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- / Products section -->

<!-- popular section -->
<section id="aa-popular-category">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <div class="aa-popular-category-area">
            <!-- start prduct navigation -->
           <ul class="nav nav-tabs aa-products-tab">
             <li class="active"><a href="#featured" data-toggle="tab">Featured</a></li>
             <li><a href="#discounted" data-toggle="tab">Discounted</a></li>
            <li><a href="#tranding" data-toggle="tab">Tranding</a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
              <!-- Start Featured category -->
              <div class="tab-pane fade in active" id="featured">
                <ul class="aa-product-catg aa-featured-slider">
                  <!-- start single product item -->
                  @if(isset($home_featured_product[$list->id][0]))
                  @foreach($home_featured_product[$list->id] as $productArr)
                  <li>
                    <figure>
                      <a class="aa-product-img" href="product/{{$productArr->slug}}"><img src="{{asset('storage/media/'.$productArr->image)}}" alt="{{$productArr->slug}}" width="200px" height="300px"></a>
                      <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                      <figcaption>
                        <h4 class="aa-product-title"><a href="product/{{$productArr->slug}}">{{$productArr->name}}</a></h4>
                        <span class="aa-product-price">TK. {{$home_featured_product_attr[$productArr->id][0]->price}}/-</span><span class="aa-product-price"><del>TK. {{$home_featured_product_attr[$productArr->id][0]->mrp}}/-</del></span>
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
            <!-- End Featured category -->
            <!-- Start discounted category -->
            <div class="tab-pane fade" id="discounted">
              <ul class="aa-product-catg aa-discounted-slider">
                <!-- start single product item -->
                @if(isset($home_discounted_product[$list->id][0]))
                @foreach($home_discounted_product[$list->id] as $productArr)
                <li>
                  <figure>
                    <a class="aa-product-img" href="product/{{$productArr->slug}}"><img src="{{asset('storage/media/'.$productArr->image)}}" alt="{{$productArr->slug}}" width="200px" height="300px"></a>
                    <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                    <figcaption>
                      <h4 class="aa-product-title"><a href="product/{{$productArr->slug}}">{{$productArr->name}}</a></h4>
                      <span class="aa-product-price">TK. {{$home_discounted_product_attr[$productArr->id][0]->price}}/-</span><span class="aa-product-price"><del>TK. {{$home_discounted_product_attr[$productArr->id][0]->mrp}}/-</del></span>
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
          <!-- End discounted category -->
          <!-- Start tranding category -->
          <div class="tab-pane fade" id="tranding">
            <ul class="aa-product-catg aa-tranding-slider">
              <!-- start single product item -->
              @if(isset($home_tranding_product[$list->id][0]))
              @foreach($home_tranding_product[$list->id] as $productArr)
              <li>
                <figure>
                  <a class="aa-product-img" href="product/{{$productArr->slug}}"><img src="{{asset('storage/media/'.$productArr->image)}}" alt="{{$productArr->slug}}" width="200px" height="300px"></a>
                  <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                  <figcaption>
                    <h4 class="aa-product-title"><a href="product/{{$productArr->slug}}">{{$productArr->name}}</a></h4>
                    <span class="aa-product-price">TK. {{$home_tranding_product_attr[$productArr->id][0]->price}}/-</span><span class="aa-product-price"><del>TK. {{$home_tranding_product_attr[$productArr->id][0]->mrp}}/-</del></span>
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
        <!-- End tranding category -->
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- / popular section -->
<!-- Support section -->
<section id="aa-support">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="aa-support-area">
          <!-- single support -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="aa-support-single">
              <span class="fa fa-truck"></span>
              <h4>FREE SHIPPING</h4>
              <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
            </div>
          </div>
          <!-- single support -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="aa-support-single">
              <span class="fa fa-clock-o"></span>
              <h4>30 DAYS MONEY BACK</h4>
              <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
            </div>
          </div>
          <!-- single support -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="aa-support-single">
              <span class="fa fa-phone"></span>
              <h4>SUPPORT 24/7</h4>
              <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- / Support section -->

<!-- Client Brand -->
<section id="aa-client-brand">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="aa-client-brand-area">
          <ul class="aa-client-brand-slider">
            @foreach($home_brand as $brand)
            <li><a href="brand/{{$brand->name}}"><img src="{{asset('storage/media/brand/'.$brand->image)}}" alt="{{$brand->name}}"></a></li>
            @endforeach
            </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- / Client Brand -->


@endsection
