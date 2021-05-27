<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <link href="{{asset('front/assets/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/css/jquery.smartmenus.bootstrap.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('front/assets/css/jquery.simpleLens.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('front/assets/css/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('front/assets/css/nouislider.css')}}">
    <link id="switcher" href="{{asset('front/assets/css/theme-color/default-theme.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/css/sequence-theme.modern-slide-in.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('front/assets/css/style.css')}}" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <script>
    var IMAGE_PATH = "{{asset('storage/media/')}}";
      var WEB_PATH = "{{url('/')}}";
    </script>

  </head>
  <body class="productPage">
   <!-- wpf loader Two -->
    <div id="wpf-loader-two">
      <div class="wpf-loader-two-inner">
        <span>Loading</span>
      </div>
    </div>
    <!-- / wpf loader Two -->
  <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
  <!-- END SCROLL TOP BUTTON -->


  <!-- Start header section -->
  <header id="aa-header">
    <!-- start header top  -->
    <div class="aa-header-top">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-top-area">
              <div class="aa-header-top-right">
                <ul class="aa-head-top-nav-right">
                  <li><a href="account.html">My Account</a></li>
                  <li class="hidden-xs"><a href="wishlist.html">Wishlist</a></li>
                  <li class="hidden-xs"><a href="{{url('/mycart')}}">My Cart</a></li>
                  <li class="hidden-xs"><a href="checkout.html">Checkout</a></li>
                  @if(session()->has('USER_LOGIN_STAT'))
                    <li><a href="{{url('/logout')}}">Logout</a></li>
                  @else
                    <li><a href="" data-toggle="modal" data-target="#login-modal">Login</a></li>
                  @endif
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header top  -->

    <!-- start header bottom  -->
    <div class="aa-header-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-bottom-area">
              <!-- logo  -->
              <div class="aa-logo">
                <!-- Text based logo -->
                <a href="{{url('/')}}">
                  <span class="fa fa-shopping-cart"></span>
                  <p>daily<strong>Shop</strong> <span>Your Shopping Partner</span></p>
                </a>
                <!-- img based logo -->
                <!-- <a href="index.html"><img src="img/logo.jpg" alt="logo img"></a> -->
              </div>
              <!-- / logo  -->
               <!-- cart box -->
               <?php
                  $getCartItem = getCartItem();
                  $totalPrice = 0;
               ?>
              <div class="aa-cartbox">
                <a class="aa-cart-link" href="javascript:void(0)">
                  <span class="fa fa-shopping-basket"></span>
                  <span class="aa-cart-title">SHOPPING CART</span>
                  <span class="aa-cart-notify">{{count($getCartItem)}}</span>
                </a>
                <div class="test">
                @if(isset($getCartItem[0]))
                <div class="aa-cartbox-summary">
                  <ul>
                    @foreach($getCartItem as $data)
                    <?php
                      $totalPrice = $totalPrice + ($data->qty * $data->price);
                    ?>
                    <li>
                      <a class="aa-cartbox-img" href="product/{{$data->slug}}"><img src="{{asset('storage/media/'.$data->attr_image)}}" alt="{{$data->slug}}"></a>
                      <div class="aa-cartbox-info">
                        <h4><a href="product/{{$data->slug}}">{{$data->name}}</a></h4>
                        <p>{{$data->qty}} x {{$data->price}} Tk.</p>
                      </div>
                    </li>
                    @endforeach
                    <li>
                      <span class="aa-cartbox-total-title">
                        Total
                      </span>
                      <span class="aa-cartbox-total-price">
                        {{$totalPrice}} Tk.
                      </span>
                    </li>
                  </ul>
                  <a class="aa-cartbox-checkout aa-primary-btn" href="{{url('/checkout')}}">Checkout</a>
                </div>
                @endif
              </div>
              </div>
              <!-- / cart box -->
              <!-- search box -->
              <div class="aa-search-box">
                <form action="">
                  <input type="text"  id="search_item" placeholder="Search here ex. 'man' ">
                  <button type="button" onclick="searchItem()"><span class="fa fa-search"></span></button>
                </form>
              </div>
              <!-- / search box -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header bottom  -->
  </header>
  <!-- / header section -->
  <!-- menu -->
  <section id="menu">
    <div class="container">
      <div class="menu-area">
        <!-- Navbar -->
        <div class="navbar navbar-default" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          <div class="navbar-collapse collapse">
            <!-- Left nav -->
            {!! getTopNav() !!}
            </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
  </section>
  <!-- / menu -->

@yield('content')

  <!-- footer -->
  <footer id="aa-footer">
    <!-- footer bottom -->
    <div class="aa-footer-top">
     <div class="container">
        <div class="row">
        <div class="col-md-12">
          <div class="aa-footer-top-area">
            <div class="row">
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <h3>Main Menu</h3>
                  <ul class="aa-footer-nav">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Our Services</a></li>
                    <li><a href="#">Our Products</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Contact Us</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Knowledge Base</h3>
                    <ul class="aa-footer-nav">
                      <li><a href="#">Delivery</a></li>
                      <li><a href="#">Returns</a></li>
                      <li><a href="#">Services</a></li>
                      <li><a href="#">Discount</a></li>
                      <li><a href="#">Special Offer</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Useful Links</h3>
                    <ul class="aa-footer-nav">
                      <li><a href="#">Site Map</a></li>
                      <li><a href="#">Search</a></li>
                      <li><a href="#">Advanced Search</a></li>
                      <li><a href="#">Suppliers</a></li>
                      <li><a href="#">FAQ</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Contact Us</h3>
                    <address>
                      <p> 25 Astor Pl, NY 10003, USA</p>
                      <p><span class="fa fa-phone"></span>+1 212-982-4589</p>
                      <p><span class="fa fa-envelope"></span>dailyshop@gmail.com</p>
                    </address>
                    <div class="aa-footer-social">
                      <a href="#"><span class="fa fa-facebook"></span></a>
                      <a href="#"><span class="fa fa-twitter"></span></a>
                      <a href="#"><span class="fa fa-google-plus"></span></a>
                      <a href="#"><span class="fa fa-youtube"></span></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     </div>
    </div>
  </footer>
  <!-- / footer -->

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="{{asset('front/assets/js/bootstrap.js')}}"></script>
  <!-- SmartMenus jQuery plugin -->
  <script type="text/javascript" src="{{asset('front/assets/js/jquery.smartmenus.js')}}"></script>
  <!-- SmartMenus jQuery Bootstrap Addon -->
  <script type="text/javascript" src="{{asset('front/assets/js/jquery.smartmenus.bootstrap.js')}}"></script>
  <!-- To Slider JS -->
  <script src="{{asset('front/assets/js/sequence.js')}}"></script>
  <script src="{{asset('front/assets/js/sequence-theme.modern-slide-in.js')}}"></script>
  <!-- Product view slider -->
  <script type="text/javascript" src="{{asset('front/assets/js/jquery.simpleGallery.js')}}"></script>
  <script type="text/javascript" src="{{asset('front/assets/js/jquery.simpleLens.js')}}"></script>
  <!-- slick slider -->
  <script type="text/javascript" src="{{asset('front/assets/js/slick.js')}}"></script>
  <!-- Price picker slider -->
  <script type="text/javascript" src="{{asset('front/assets/js/nouislider.js')}}"></script>
  <!-- Custom js -->
  <script src="{{asset('front/assets/js/custom.js')}}"></script>

  </body>
</html>
