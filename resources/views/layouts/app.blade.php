<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>@yield('title') | JOTYLIFESTYLE.COM</title>
<meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1">
<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-touch-fullscreen" content="yes">
<meta name="HandheldFriendly" content="True">
<link rel="icon" href="/favicon.png" type="image/x-icon">
<!-- CSS  -->
<link rel="stylesheet" href="{{ asset('/lib/font-awesome/web-fonts-with-css/css/fontawesome-all.css') }}">
<link rel="stylesheet" href="{{ asset('/css/materialize.min.css') }}">
<link rel="stylesheet" href="{{ asset('/css/normalize.css') }}">
<link rel="stylesheet" href="{{ asset('/css/style.css') }}">
<!-- materialize icon -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!-- Owl carousel -->
<link rel="stylesheet" href="{{ asset('/lib/owlcarousel/assets/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('/lib/owlcarousel/assets/owl.theme.default.min.css') }}">
<!-- Slick CSS -->
<link rel="stylesheet" type="text/css" href="{{ asset('/lib/slick/slick/slick.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/lib/slick/slick/slick-theme.css') }}">
<!-- Magnific Popup core CSS file -->
<link rel="stylesheet" href="{{ asset('/lib/Magnific-Popup-master/dist/magnific-popup.css') }}">
</head>
<body id="homepage">
<!-- BEGIN PRELOADING -->
<div class="preloading">
  <div class="wrap-preload">
    <div class="cssload-loader"></div>
  </div>
</div>
<!-- END PRELOADING -->
<!-- HEADER -->
<header id="header">
<div class="nav-wrapper container">
  <div class="header-logo">
    <a href="/" class="nav-logo">JotyLifestyle</a>
  </div>

  @guest
  <div class="header-icon-menu">
    <a href="#" data-activates="nav-mobile-account" class="button-collapse" id="button-collapse-account"><i class="far fa-user"></i></a>
  </div>
  <div class="header-menu-button">
    <a href="#" data-activates="nav-mobile-category" class="button-collapse" id="button-collapse-category">
    <div class="cst-btn-menu">
      <i class="fas fa-search"></i>
    </div>
    </a>
  </div>
  @else
  <div class="header-icon-menu">
    <a href="#" data-activates="nav-mobile-account" class="button-collapse" id="button-collapse-account"><i class="far fa-user"></i></a>
  </div>
  <div class="header-icon-menu cart-item-wrap">
    <a href="/cart">
    <i class="fas fa-shopping-cart"></i>
      @if(Cart::getContent()->count() > 0)
        <span class="cart-item">{{ Cart::getContent()->count() }}</span>
      @else
      @endif
    </a>
  </div>
  <div class="header-menu-button">
    <a href="#" data-activates="nav-mobile-category" class="button-collapse" id="button-collapse-category">
    <div class="cst-btn-menu">
      <i class="fas fa-search"></i>
    </div>
    </a>
  </div>

 @endguest
</div>
</header>
<!-- END HEADER -->
<!-- SIDE NAV-->
<nav>
<!-- SIDENAV CATEGORY-->
<ul id="nav-mobile-category" class="side-nav">
  <li class="sidenav-logo">JotyLifestyle
  </li>
  <li>
    <div class="search-wrapper ">
      <form action="{{ route('search') }}" method="GET" role="search">
        <input id="search" type="text" name="query" autofocus="query" required="query">
        <button class="unstyled-button" type="submit"><i class="material-icons">search</i></button>
      </form>
      <div class="search-results"></div>
    </div>
  </li>
</ul>
<!-- END SIDENAV CATEGORY-->
<!-- SIDENAV ACCOUNT-->
<ul id="nav-mobile-account" class="side-nav">

          @guest

          <li class="sidenav-logo">JotyLifestyle
          </li>

          <li>
            <a href="/login"><i class="fas fa-sign-in-alt"></i>Sign In</a>
          </li>
          <li>
            <a href="/register"><i class="fas fa-sign-out-alt"></i>Sign Up</a>
          </li>
          <li>
            <a href="/contact"><i class="fas fa-envelope"></i>Contact</a>
          </li>

          @else

          <li class="profile">
            <div class="li-profile-info">
              <img src="/userpic/{{ Auth::user()->userpic }}" alt="profile">
              <h2>{{ Auth::user()->name }}</h2>
            </div>
            <div class="bg-profile-li" style="background-image: url(/img/bg-profile.jpg);">
            </div>
          </li>

          @if (Auth::user()->is_admin == 0)

          <li>
            <a href="/user"><i class="far fa-user"></i>My Profile</a>
          </li>
          <li>
            <a href="/orders"><i class="fas fa-columns"></i>My Orders</a>
          </li>
          <li>
            <ul class="collapsible collapsible-accordion">
              <li>
                <div class="collapsible-header">
                  <i class="fas fa-cog"></i>Settings <span><i class="fas fa-caret-down"></i></span>
                </div>
                <div class="collapsible-body">
                  <ul>
                    <li>
                      <a class="waves-effect waves-blue" href="/update"><i class="fas fa-angle-right"></i>Update Profile</a>
                    </li>
                    <li>
                      <a class="waves-effect waves-blue" href="/changepassword"><i class="fas fa-angle-right"></i>Change Password</a>
                    </li>
                  </ul>
                </div>
              </li>
            </ul>
          </li>
          <li>
            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i>Sign Out</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
            </form>
          </li>

          @else

          <li>
            <a href="/admin"><i class="fas fa-angle-right"></i>Dashboard</a>
          </li>
          <li>
            <ul class="collapsible collapsible-accordion">
              <li>
                <div class="collapsible-header">
                  <i class="fas fa-angle-right"></i>Main Category <span><i class="fas fa-caret-down"></i></span>
                </div>
                <div class="collapsible-body">
                  <ul>
                    <li>
                      <a class="waves-effect waves-blue" href="/addcategories"><i class="fas fa-angle-right"></i>Add Categories</a>
                    </li>
                    <li>
                      <a class="waves-effect waves-blue" href="/categories"><i class="fas fa-angle-right"></i>View Categories</a>
                    </li>
                  </ul>
                </div>
              </li>
            </ul>
          </li>
          <li>
            <ul class="collapsible collapsible-accordion">
              <li>
                <div class="collapsible-header">
                  <i class="fas fa-angle-right"></i>SubCategory <span><i class="fas fa-caret-down"></i></span>
                </div>
                <div class="collapsible-body">
                  <ul>
                    <li>
                      <a class="waves-effect waves-blue" href="/addsubcategories"><i class="fas fa-angle-right"></i>Add SubCategories</a>
                    </li>
                    <li>
                      <a class="waves-effect waves-blue" href="/subcategories"><i class="fas fa-angle-right"></i>View SubCategories</a>
                    </li>
                  </ul>
                </div>
              </li>
            </ul>
          </li>
          <li>
            <ul class="collapsible collapsible-accordion">
              <li>
                <div class="collapsible-header">
                  <i class="fas fa-angle-right"></i>Products <span><i class="fas fa-caret-down"></i></span>
                </div>
                <div class="collapsible-body">
                  <ul>
                    <li>
                      <a class="waves-effect waves-blue" href="/addproducts"><i class="fas fa-angle-right"></i>Add Products</a>
                    </li>
                    <li>
                      <a class="waves-effect waves-blue" href="/viewproducts"><i class="fas fa-angle-right"></i>View Products</a>
                    </li>
                  </ul>
                </div>
              </li>
            </ul>
          </li>
          <li>
            <ul class="collapsible collapsible-accordion">
              <li>
                <div class="collapsible-header">
                  <i class="fas fa-angle-right"></i>Campaign <span><i class="fas fa-caret-down"></i></span>
                </div>
                <div class="collapsible-body">
                  <ul>
                    <li>
                      <a class="waves-effect waves-blue" href="/addcamproducts"><i class="fas fa-angle-right"></i>Add Products</a>
                    </li>
                    <li>
                      <a class="waves-effect waves-blue" href="/viewcamproducts"><i class="fas fa-angle-right"></i>View Products</a>
                    </li>
                  </ul>
                </div>
              </li>
            </ul>
          </li>
          <li>
            <a href="/viewadmins"><i class="fas fa-angle-right"></i>Admins</a>
          </li>
          <li>
            <ul class="collapsible collapsible-accordion">
              <li>
                <div class="collapsible-header">
                  <i class="fas fa-angle-right"></i>Users <span><i class="fas fa-caret-down"></i></span>
                </div>
                <div class="collapsible-body">
                  <ul>
                    <li>
                      <a class="waves-effect waves-blue" href="/viewusers"><i class="fas fa-angle-right"></i>View Users</a>
                    </li>
                    <li>
                      <a class="waves-effect waves-blue" href="/searchusers"><i class="fas fa-angle-right"></i>Search Users</a>
                    </li>
                  </ul>
                </div>
              </li>
            </ul>
          </li>
          <li>
            <ul class="collapsible collapsible-accordion">
              <li>
                <div class="collapsible-header">
                  <i class="fas fa-angle-right"></i>Orders <span><i class="fas fa-caret-down"></i></span>
                </div>
                <div class="collapsible-body">
                  <ul>
                    <li>
                      <a class="waves-effect waves-blue" href="/pending"><i class="fas fa-angle-right"></i>Pending</a>
                    </li>
                    <li>
                      <a class="waves-effect waves-blue" href="/processing"><i class="fas fa-angle-right"></i>Processing</a>
                    </li>
                    <li>
                      <a class="waves-effect waves-blue" href="/picked"><i class="fas fa-angle-right"></i>Picked</a>
                    </li>
                    <li>
                      <a class="waves-effect waves-blue" href="/delivered"><i class="fas fa-angle-right"></i>Delivred</a>
                    </li>
                    <li>
                      <a class="waves-effect waves-blue" href="/cancelled"><i class="fas fa-angle-right"></i>Cancelled</a>
                    </li>
                    <li>
                      <a class="waves-effect waves-blue" href="/track"><i class="fas fa-angle-right"></i>Track Orders</a>
                    </li>
                  </ul>
                </div>
              </li>
            </ul>
          </li>
          <li>
            <a href="/trashbox"><i class="fas fa-angle-right"></i>Trash Box</a>
          </li>
          <li>
            <a href="/settings"><i class="fas fa-angle-right"></i>Settings</a>
          </li>
          <li>
            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fas fa-angle-right"></i>Sign Out</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
            </form>
          </li>

          @endif

          @endguest
          </ul>
        </div>
      </li>
    </ul>
  </li>
</ul>
<!-- END SIDENAV ACCOUNT--></nav>
<!-- END SIDENAV-->




@yield('content')




@foreach(\App\Settings::all()->where('id', '1') as $als)
<!-- FOOTER  -->
<footer id="footer">
<div class="footer-info">
  <div class="container">
    <div class="col s12 center">
      <i class="fas fa-map-marker-alt"></i> {{$als->address}}<br>
      <i class="fas fa-phone-square"></i> {{$als->phonenumber}} <br>
      <i class="fas fa-envelope"></i> {{$als->email}}
    </div>
  </div>
</div>
<div class="container">
  <div class="row row-footer-icon">
    <div class="col s12">
      <div class="footer-sosmed-icon ">
        <div class="wrap-circle-sosmed ">
          <a href="{{$als->instagram}}">
          <div class="circle-sosmed">
            <i class="fab fa-instagram"></i>
          </div>
          </a>
        </div>
        <div class="wrap-circle-sosmed ">
          <a href="{{$als->linkedin}}">
          <div class="circle-sosmed">
            <i class="fab fa-linkedin-in"></i>
          </div>
          </a>
        </div>
        <div class="wrap-circle-sosmed ">
          <a href="{{$als->twitter}}">
          <div class="circle-sosmed">
            <i class="fab fa-twitter"></i>
          </div>
          </a>
        </div>
        <div class="wrap-circle-sosmed ">
          <a href="{{$als->facebook}}">
          <div class="circle-sosmed">
            <i class="fab fa-facebook-f"></i>
          </div>
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="row copyright">
     2022 <span>JOTY Lifestyle</span>, All rights reserved.
  </div>
</div>
</footer>
<!-- END FOOTER -->
@endforeach
<!-- Script -->
<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="{{ asset('/js/jquery.min.js') }}"></script>
<script src="{{ asset('/js/materialize.min.js') }}"></script>
<!-- Owl carousel -->
<script src="{{ asset('/lib/owlcarousel/owl.carousel.min.js') }}"></script>
<!-- Magnific Popup core JS file -->
<script src="{{ asset('/lib/Magnific-Popup-master/dist/jquery.magnific-popup.js') }}"></script>
<!-- Slick JS -->
<script src="{{ asset('/lib/slick/slick/slick.min.js') }}"></script>
<!-- Custom script -->
<script src="{{ asset('/js/custom.js') }}"></script>
</body>
</html>

