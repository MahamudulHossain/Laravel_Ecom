<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>@yield('title')</title>

    <!-- Fontfaces CSS-->
    <link href="{{asset('admin/assets/css/font-face.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin/assets/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin/assets/vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin/assets/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{asset('admin/assets/vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{asset('admin/assets/vendor/animsition/animsition.min.css')}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{asset('admin/assets/css/theme.css')}}" rel="stylesheet" media="all">

</head>

<body class="animsition">
  <div class="page-wrapper">
      <!-- HEADER MOBILE-->
      <header class="header-mobile d-block d-lg-none">
          <div class="header-mobile__bar">
              <div class="container-fluid">
                  <div class="header-mobile-inner">
                      <a class="logo" href="{{url('admins/dashboard')}}">
                          <img src="{{asset('admin/assets/images/icon/logo.png')}}" />
                      </a>
                      <button class="hamburger hamburger--slider" type="button">

                      </button>
                  </div>
              </div>
          </div>
          <nav class="navbar-mobile">
              <div class="container-fluid">
                  <ul class="navbar-mobile__list list-unstyled">
                      <li class="@yield('dashboard_active')">
                          <a class="js-arrow" href="{{url('admins/dashboard')}}">
                              <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                      </li>
                      <li class="@yield('category_active')">
                          <a href="{{url('admins/category')}}">
                              <i class="fa fa-list"></i>Category</a>
                      </li>
                      <li class="@yield('coupon_active')">
                          <a href="{{url('admins/coupon')}}">
                              <i class="fa fa-tags"></i>Coupon</a>
                      </li>
                      <li class="@yield('color_active')">
                          <a href="{{url('admins/color')}}">
                              <i class="fas fa-paint-brush"></i>Color</a>
                      </li>
                      <li class="@yield('size_active')">
                          <a href="{{url('admins/size')}}">
                              <i class="fa fa-scribd"></i>Size</a>
                      </li>
                      <li class="@yield('product_active')">
                          <a href="{{url('admins/product')}}">
                              <i class="fa fa-product-hunt"></i>Product</a>
                      </li>
                  </ul>
              </div>
          </nav>
      </header>
      <!-- END HEADER MOBILE-->

      <!-- MENU SIDEBAR-->
      <aside class="menu-sidebar d-none d-lg-block">
          <div class="logo">
            <a href="{{url('admins/dashboard')}}">
                <img src="{{asset('admin/assets/images/icon/logo.png')}}" />
            </a>
          </div>
          <div class="menu-sidebar__content js-scrollbar1">
              <nav class="navbar-sidebar">
                  <ul class="list-unstyled navbar__list">
                      <li class="@yield('dashboard_active')">
                          <a class="js-arrow" href="{{url('admins/dashboard')}}">
                              <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                      </li>
                      <li class="@yield('category_active')">
                          <a href="{{url('admins/category')}}">
                              <i class="fa fa-list"></i>Category</a>
                      </li>
                      <li class="@yield('coupon_active')">
                          <a href="{{url('admins/coupon')}}">
                              <i class="fa fa-tags"></i>Coupon</a>
                      </li>
                      <li class="@yield('color_active')">
                          <a href="{{url('admins/color')}}">
                              <i class="fas fa-paint-brush"></i>Color</a>
                      </li>
                      <li class="@yield('size_active')">
                          <a href="{{url('admins/size')}}">
                              <i class="fa fa-scribd"></i>Size</a>
                      </li>
                      <li class="@yield('product_active')">
                          <a href="{{url('admins/product')}}">
                              <i class="fa fa-product-hunt"></i>Product</a>
                      </li>
                  </ul>
              </nav>
          </div>
      </aside>
      <!-- END MENU SIDEBAR-->

      <!-- PAGE CONTAINER-->
      <div class="page-container">
          <!-- HEADER DESKTOP-->
          <header class="header-desktop">
              <div class="section__content section__content--p30">
                  <div class="container-fluid">
                      <div class="header-wrap">
                          <form class="form-header">

                          </form>
                          <div class="header-button">
                              <div class="account-wrap">
                                  <div class="account-item clearfix js-item-menu">
                                      <div class="content">
                                          <a class="js-acc-btn" href="javascript:void(0)">ADMIN</a>
                                      </div>
                                      <div class="account-dropdown js-dropdown">
                                          <div class="account-dropdown__body">
                                              <div class="account-dropdown__item">
                                                  <a href="javascript:void(0)">
                                                      <i class="zmdi zmdi-account"></i>Account</a>
                                              </div>
                                          </div>
                                          <div class="account-dropdown__footer">
                                              <a href="{{url('admins/logout')}}">
                                                  <i class="zmdi zmdi-power"></i>Logout</a>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </header>
          <!-- END HEADER DESKTOP-->

          <!-- MAIN CONTENT-->
          <div class="main-content">
              <div class="section__content section__content--p30">
                  <div class="container-fluid">
                      @yield('content')
                  </div>
              </div>
          </div>
      </div>
      <!-- END PAGE CONTAINER-->

  </div>

    <!-- Jquery JS-->
    <script src="{{asset('admin/assets/vendor/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap JS-->
    <script src="{{asset('admin/assets/vendor/bootstrap-4.1/popper.min.js')}}"></script>
    <script src="{{asset('admin/assets/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
    <!-- Vendor JS       -->
    <script src="{{asset('admin/assets/vendor/animsition/animsition.min.js')}}"></script>
    <script src="{{asset('admin/assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}">
    </script>

    <!-- Main JS-->
    <script src="{{asset('admin/assets/js/main.js')}}"></script>
    <script src="https://use.fontawesome.com/8b1efc3145.js"></script>

</body>

</html>
<!-- end document-->
