@extends('front.layout')

@section('title','Search Result')

@section('content')

<section id="aa-product-category">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-8">
          <div class="aa-product-catg-content">
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

      </div>
    </div>
  </section>
@endsection
