@extends('front.layout')

@section('title','Category Page')

@section('content')

<section id="aa-product-category">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
          <div class="aa-product-catg-content">
            <div class="aa-product-catg-head">
              <div class="aa-product-catg-head-left">
                <form action="" class="aa-sort-form">
                  <label for="">Sort by</label>
                  <select id="sort_by_value" onchange="sort_by()">
                    <option value="" selected="Default">Default</option>
                    <option value="name">Name</option>
                    <option value="price_lh">Price(Low > High)</option>
                    <option value="price_hl">Price(High > Low)</option>
                    <option value="date">Date</option>
                  </select>
                </form>
                <span class="sort_msg">{{$sort_txt}}</span>
              </div>
              <div class="aa-product-catg-head-right">
                <a id="grid-catg" href="#"><span class="fa fa-th"></span></a>
                <a id="list-catg" href="#"><span class="fa fa-list"></span></a>
              </div>
            </div>
            <div class="aa-product-catg-body">
              <ul class="aa-product-catg">
                <!-- start single product item -->
                @if(isset($category_product[0]))
                @foreach($category_product as $productArr)
                <li>
                  <figure>
                    <a class="aa-product-img" href="/product/{{$productArr->slug}}"><img src="{{asset('storage/media/'.$productArr->image)}}" alt="{{$productArr->slug}}" width="200px" height="300px"></a>
                    <a class="aa-add-card-btn" href="/product/{{$productArr->slug}}"><span class="fa fa-shopping-cart"></span>Shop Now</a>
                    <figcaption>
                      <h4 class="aa-product-title"><a href="/product/{{$productArr->slug}}">{{$productArr->name}}</a></h4>
                      <span class="aa-product-price">TK. {{$category_product_attr[$productArr->id][0]->price}}/-</span><span class="aa-product-price"><del>TK. {{$category_product_attr[$productArr->id][0]->mrp}}/-</del></span>
                      <p class="aa-product-descrip">{!! $productArr->short_desc !!}</p>
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
            <div class="aa-product-catg-pagination">
              <nav>
                <ul class="pagination">
                  <li>
                    <a href="#" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                    </a>
                  </li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li>
                    <a href="#" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
          <aside class="aa-sidebar">
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Category</h3>
              <ul class="aa-catg-nav">
                @foreach($home_left_category as $cat)
                  @if($cat->category_slug == $slug)
                    <li><a href="{{url('/category/'.$cat->category_slug)}}" class="active_left_cat">{{$cat->category_name}}</a></li>
                  @else
                    <li><a href="{{url('/category/'.$cat->category_slug)}}">{{$cat->category_name}}</a></li>
                  @endif  
                @endforeach
              </ul>
            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Shop By Price</h3>
              <!-- price range -->
              <div class="aa-sidebar-price-range">
               <form>
                  <div id="skipstep" class="noUi-target noUi-ltr noUi-horizontal noUi-background">
                  </div>
                  <span id="skip-value-lower" class="example-val">300</span>
                 <span id="skip-value-upper" class="example-val">1300</span>
                 <button class="aa-filter-btn" type="button" onclick="price_filter()">Filter</button>
               </form>
              </div>

            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Shop By Color</h3>
              <div class="aa-color-tag">
                @foreach($color as $color)
                  @if(in_array($color->id,$colorFilterArr))
                  <a class="aa-color-{{strtolower($color->color)}} active-color" href="javascript:void(0)" onclick="color_filter('{{$color->id}}','1')"></a>
                  @else
                  <a class="aa-color-{{strtolower($color->color)}}" href="javascript:void(0)" onclick="color_filter('{{$color->id}}','0')"></a>
                  @endif
                @endforeach
              </div>
            </div>
          </aside>
        </div>

      </div>
    </div>
  </section>

 <form id="sortFrm">
   <input type="hidden" id="sort_value" name="sort_value" />
   <input type="hidden" id="price_filter_lower" name="price_filter_lower" value="{{$price_lower}}"/>
   <input type="hidden" id="price_filter_upper" name="price_filter_upper" value="{{$price_upper}}"/>
   <input type="hidden" id="color_filter" name="color_filter" value="{{$color_filter}}" />
 </form>
@endsection
