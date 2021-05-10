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
                  <div class="aa-price-block">
                    <span class="aa-product-view-price">Tk. {{$product_detail_attr[$product_detail[0]->id][0]->price}}/-</span>
                    <span class="aa-product-view-price"><del>Tk. {{$product_detail_attr[$product_detail[0]->id][0]->mrp}}/-</del></span>
                  </div>
                  <p>{!!$product_detail[0]->short_desc!!}</p>
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
                      <a href="javascript:void(0)">{{$attr}}</a>
                      @endif
                    @endforeach

                  </div>
                  <h4>Color</h4>
                  <div class="aa-color-tag">
                    @foreach($product_detail_attr[$product_detail[0]->id] as $attr)
                      @if($attr->color !='')
                      <?php
                      $col='';
                        $col = strtolower($attr->color);
                      ?>
                      <a href="javascript:void(0)" class="aa-color-{{$col}}" onclick=show_color_image("{{asset('storage/media/'.$attr->attr_image)}}")></a>
                      @endif
                    @endforeach
                  </div>
                  <div class="aa-prod-quantity">
                    <form action="">
                      <select id="" name="">
                        <option selected="1" value="0">1</option>
                        <option value="1">2</option>
                        <option value="2">3</option>
                        <option value="3">4</option>
                        <option value="4">5</option>
                        <option value="5">6</option>
                      </select>
                    </form>
                    <p class="aa-prod-category">
                      Model: <a href="javascript:void(0)">{{$product_detail[0]->model}}</a>
                    </p>
                  </div>
                  <div class="aa-prod-view-bottom">
                    <a class="aa-add-to-cart-btn" href="#">Add To Cart</a>
                  </div>
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
                 <h4>2 Reviews for T-Shirt</h4>
                 <ul class="aa-review-nav">
                    <li>
                      <div class="media">
                        <div class="media-left">
                          <a href="#">
                            <img class="media-object" src="" alt="girl image">
                          </a>
                        </div>
                        <div class="media-body">
                          <h4 class="media-heading"><strong>Marla Jobs</strong> - <span>March 26, 2016</span></h4>
                          <div class="aa-product-rating">
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star-o"></span>
                          </div>
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        </div>
                      </div>
                    </li>
                 </ul>
                 <h4>Add a review</h4>
                 <div class="aa-your-rating">
                   <p>Your Rating</p>
                   <a href="#"><span class="fa fa-star-o"></span></a>
                   <a href="#"><span class="fa fa-star-o"></span></a>
                   <a href="#"><span class="fa fa-star-o"></span></a>
                   <a href="#"><span class="fa fa-star-o"></span></a>
                   <a href="#"><span class="fa fa-star-o"></span></a>
                 </div>
                 <!-- review form -->
                 <form action="" class="aa-review-form">
                    <div class="form-group">
                      <label for="message">Your Review</label>
                      <textarea class="form-control" rows="3" id="message"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" id="name" placeholder="Name">
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" id="email" placeholder="example@gmail.com">
                    </div>

                    <button type="submit" class="btn btn-default aa-review-submit">Submit</button>
                 </form>
               </div>
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
                  <a class="aa-product-img" href="{{$related_products[0]->slug}}"><img src="{{asset('storage/media/'.$related_products[0]->image)}}" alt="{{$related_products[0]->slug}}" width='200px' height='300px' ></a>
                  <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                  <figcaption>
                    <h4 class="aa-product-title"><a href="{{$related_products[0]->slug}}">{{$related_products[0]->name}}</a></h4>
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
</section>


@endsection
