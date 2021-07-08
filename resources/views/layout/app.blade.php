<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{$name1}}</title>
    <script type="application/ld+json">
     {
       "@context": "https://schema.org",
       "@type": "Organization",
       "url": "https://welcomebajar.com/",
       "logo": "{{$baseurl.$logo->logo_img}}"
   }
</script>
<meta name="title" content="{{$name1}}">
<meta name="description" content="{{$description1}}">
<meta name="author" content="Mehedi Hasan Sabuj">
<link rel="apple-touch-icon" href="{{$baseurl.$logo->fav}}">
<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:title" content="{{$name1}}">
<meta property="og:description" content="{{$description1}}">
<meta property="og:image" content="{{$prev_image}}">
<!-- Twitter -->
<meta property="twitter:card" content="{{$baseurl.$logo->logo_img}}">
<meta property="twitter:title" content="{{$name1}}">
<meta property="twitter:description" content="{{$description1}}">
<meta property="twitter:image" content="{{$prev_image}}">
<!-- Favicon -->
<link rel="shortcut icon" href="{{$baseurl.$logo->fav}}">
<link rel="icon" href="{{$baseurl.$logo->fav}}">

<script>
    WebFontConfig = {
        google: { families: [ 'Poppins:400,500,600,700,800' ] }
    };
    ( function ( d ) {
        var wf = d.createElement( 'script' ), s = d.scripts[ 0 ];
        wf.src = 'js/webfont.js';
        wf.async = true;
        s.parentNode.insertBefore( wf, s );
    } )( document );
</script>



<link rel="stylesheet" type="text/css" href="{{asset('vendor/fontawesome-free/css/all.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendor/animate/animate.min.css')}}">

<!-- Plugins CSS File -->
<link rel="stylesheet" type="text/css" href="{{asset('vendor/magnific-popup/magnific-popup.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendor/owl-carousel/owl.carousel.min.css')}}">

<!-- Main CSS File -->
<link rel="stylesheet" type="text/css" href="{{asset('css/demo22.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/style.min.css')}}">
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
@stack('styles_different_page')
@stack("filter_css")
</head>

<body class="home">

    <div class="page-wrapper">
        <h1 class="d-none">Riode - Responsive eCommerce HTML Template</h1>
        <header class="header">
            <div class="header-top">
                <div class="container">
                    <div class="header-left">
                        <p class="welcome-msg pb-2">Welcome to {{ $info->shop_name }}</p>
                    </div>
                    <div class="header-right">
                        <!-- End DropDown Menu -->
                        <div class="dropdown dropdown-expanded">
                            <a href="#dropdown">Links</a>
                            <ul class="dropdown-box">
                                <li><a href="/about-us">About</a></li>
                                <li><a href="/blog">Blog</a></li>
                                <li><a href="/faq">FAQ</a></li>
                                <li><a href="/FFAcontact-us">Contact</a></li>
                                @guest
                                @if (Route::has('login'))
                                <li>
                                    <a href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @endif

                                @if (Route::has('register'))
                                <li>
                                    <a href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                                @endif
                                @else
                                <li>
                                    <a href="#">
                                        {{ Auth::user()->name }}
                                    </a>
                                </li>
                                <li>
                                    <li><a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                                       {{ __('Logout') }}
                                   </a>

                                   <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End HeaderTop -->
        <div class="header-middle sticky-header fix-top sticky-content">
            <div class="container">
                <div class="header-left">
                    <a href="#" class="mobile-menu-toggle">
                        <i class="d-icon-bars2"></i>
                    </a>
                    <a href="/" class="logo">
                        <img src="{{$baseurl."c_scale,w_154/".$logo->logo_img}}" alt="{{ $logo->logo_alt }}" width="154" />
                    </a>
                    <!-- End Logo -->

                    <div class="header-search hs-simple">
                        <form action="#" class="input-wrapper">
                            <input type="text" class="form-control" name="search" autocomplete="off"
                            placeholder="Search..." required />
                            <button class="btn btn-search" type="submit">
                                <i class="d-icon-search"></i>
                            </button>
                        </form>
                    </div>
                    <!-- End Header Search -->
                </div>
                <div class="header-right">
                    <a href="tel:#" class="icon-box icon-box-side">
                        <div class="icon-box-icon">
                            <i class="d-icon-phone"></i>
                        </div>
                        <div class="icon-box-content d-lg-show">
                            <h4 class="icon-box-title">Call Us Now:</h4>
                            <p>{{ $info->phone }}</p>
                        </div>
                    </a>
                    <span class="divider"></span>
                    <a href="/wishlist" class="wishlist">
                        <i class="d-icon-heart"><span class="Wishlist-count">0</span></i>
                    </a>
                    <span class="divider"></span>
                    <div class="dropdown cart-dropdown type2 cart-offcanvas mr-0 mr-lg-2">
                        <a href="#" class="cart-toggle label-block link">
                            <div class="cart-label d-lg-show ls-normal">
                                <span class="cart-name ls-m">Shopping Cart:</span>
                                <span class="cart-price">{{ $currency }} 0.00</span>
                            </div>
                            <i class="d-icon-bag"><span class="cart-count">0</span></i>
                        </a>
                        <div class="cart-overlay"></div>
                        <!-- End Cart Toggle -->
                        <div class="dropdown-box">
                            <div class="cart-header">
                                <h4 class="cart-title">Shopping Cart</h4>
                                <a href="#" class="btn btn-dark btn-link btn-icon-right btn-close">close<i
                                    class="d-icon-arrow-right"></i><span class="sr-only">Cart</span></a>
                                </div>
                                <div class="products scrollable cart-side">
                                    <!-- End of Cart Product -->
                                </div>
                                <!-- End of Products  -->
                                <div class="cart-box">
                                    <div class="cart-total">
                                        <label>Subtotal:</label>
                                        <span class="cart-price">0</span>
                                    </div>
                                    <!-- End of Cart Total -->
                                    <div class="cart-action">
                                        <a href="/cart" class="btn btn-dark btn-link">View Cart</a>
                                        <a href="checkout" class="btn btn-dark"><span>Go To Checkout</span></a>
                                    </div>
                                </div>
                                <!-- End of Cart Action -->
                            </div>
                            <!-- End Dropdown Box -->
                        </div>
                        <div class="header-search hs-toggle mobile-search">
                            <a href="#" class="search-toggle">
                                <i class="d-icon-search"></i>
                            </a>
                            <form action="#" class="input-wrapper">
                                <input type="text" class="form-control" name="search" autocomplete="off"
                                placeholder="Search your keyword..." required />
                                <button class="btn btn-search" type="submit">
                                    <i class="d-icon-search"></i>
                                </button>
                            </form>
                        </div>
                        <!-- End of Header Search -->
                    </div>
                </div>

            </div>

            <div class="header-bottom has-dropdown pb-0">
                <div class="container d-flex align-items-center custom-padding-left custom-color">
                    <div class="dropdown category-dropdown has-border fixed">
                        <a href="#" class="text-white font-weight-semi-bold category-toggle"><i
                            class="d-icon-bars2"></i><span>Shop By Categories</span></a>
                            <!-- <div class="dropdown-overlay"></div> -->
                            <div class="dropdown-box dropdown-box-category">
                                <ul class="menu vertical-menu category-menu">
                                    <li><a href="/shop" class="menu-title">Browse Our
                                    Categories</a></li>
                                    @if($categories)
                                    @foreach($categories as $row)
                                    @php
                                    $sub_category = Helpers::getSubcategory($row->cat_id);
                                    @endphp
                                    <li @if(count($sub_category)>0) class="submenu" @endif>
                                        <a class="d-flex" href="categories/{{ $row->cat_slug }}"><img src="{{ $baseurl."c_scale,w_20/".$row->cat_icon }}" width="20px"> &nbsp;&nbsp;{{  $row->cat_title }}</a>
                                        @if(count($sub_category)>0)
                                        <ul>
                                            @foreach($sub_category as $subrow)
                                            <li><a href="/sub-categories/{{ $subrow->sub_cat_slug }}">{{ $subrow->sub_cat_name }}</a></li>
                                            @endforeach
                                        </ul>
                                        @endif
                                    </li>
                                    @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <nav class="main-nav ml-4">
                            <ul class="menu">
                                <li class="active">
                                    <a href="/">HOME</a>
                                </li>
                                <li>
                                    <a href="/shop">SHOP</a>
                                </li>
                                <li>
                                    <a href="/about-us">ABOUT US</a>
                                </li>
                                <li>
                                    <a href="/contact-us">CONTACT US</a>
                                </li>
                                <li>
                                    <a href="/faq">FAQ</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- End HeaderBottom -->
            </header>
            <!-- End Header -->
            @yield('content');
            <!-- End Main -->
            <footer class="footer">
                <div class="container">
                    <div class="footer-top">
                        <div class="row align-items-center">
                            <div class="col-lg-3">
                                <a href="/" class="logo-footer">
                                    <img src="{{$baseurl."c_scale,w_154/".$logo->logo_img}}" alt="{{ $logo->logo_alt }}" width="154"
                                    height="43" />
                                </a>
                                <!-- End FooterLogo -->
                            </div>
                            <div class="col-lg-9">
                                <div class="widget widget-newsletter form-wrapper form-wrapper-inline">
                                    <div class="newsletter-info mx-auto mr-lg-2 ml-lg-4">
                                        <h4 class="widget-title">Subscribe to our Newsletter</h4>
                                        <p>Get all the latest information, Sales and Offers.</p>
                                    </div>
                                    <form action="#" class="input-wrapper input-wrapper-inline">
                                        <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Email address here..." required />
                                        <button class="btn btn-primary btn-rounded btn-md ml-2" type="submit">subscribe<i
                                            class="d-icon-arrow-right"></i></button>
                                        </form>
                                    </div>
                                    <!-- End Newsletter -->
                                </div>
                            </div>
                        </div>
                        <!-- End FooterTop -->
                        <div class="footer-middle">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <div class="widget widget-info">
                                        <h4 class="widget-title">Contact Info</h4>
                                        <ul class="widget-body">
                                            <li>
                                                <label>Phone:</label>
                                                <a href="tel:{{ $info->phone }}">{{ $info->phone }}</a>
                                            </li>
                                            <li>
                                                <label>Email:</label>
                                                <a href="mailto:{{ $info->email }}">{{ $info->email }}</a>
                                            </li>
                                            <li>
                                                <label>Address:</label>
                                                <a href="#">{{ $info->address }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- End Widget -->
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="widget ml-lg-4">
                                        <h4 class="widget-title">About Us</h4>
                                        <ul class="widget-body">
                                            <li>
                                                <a href="/about-us">About Us</a>
                                            </li>
                                            <li>
                                                <a href="#">Order History</a>
                                            </li>
                                            <li>
                                                <a href="#">Returns</a>
                                            </li>
                                            <li>
                                                <a href="/contact-us">Contact Us</a>
                                            </li>
                                            <li>
                                                <a href="/terms-and-condition">Terms &amp; Condition</a>
                                            </li>
                                            <li>
                                                <a href="/privacy-policy">Privacy Policy</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- End Widget -->
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="widget ml-lg-4">
                                        <h4 class="widget-title">My Account</h4>
                                        <ul class="widget-body">
                                            <li>
                                                <a href="/login">Sign in</a>
                                            </li>
                                            <li>
                                                <a href="/cart">View Cart</a>
                                            </li>
                                            <li>
                                                <a href="/wishlist">My Wishlist</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- End Widget -->
                                </div>
                            </div>
                        </div>
                        <!-- End FooterMiddle -->
                        <div class="footer-bottom">
                            <div class="footer-left">
                                <figure class="payment">
                                    <img src="/images/payment.png" alt="payment" width="159" height="29" />
                                </figure>
                            </div>
                            <div class="footer-center">
                                <p class="copyright">{{ $info->shop_name }} &copy; 2021. All Rights Reserved</p>
                            </div>
                            <div class="footer-right">
                                <div class="social-links">
                                    <a target="_blank" href="{{ $info->facebook }}" class="social-link social-facebook fab fa-facebook-f"></a>
                                    <a target="_blank" href="{{ $info->instagram }}" class="social-link social-twitter fab fa-twitter"></a>
                                    <a target="_blank" href="{{ $info->twitter }}" class="social-link social-linkedin fab fa-linkedin-in"></a>
                                </div>
                            </div>
                        </div>
                        <!-- End FooterBottom -->
                    </div>
                </footer>
                <!-- End Footer -->
            </div>
            <!-- Sticky Footer -->
            <div class="sticky-footer sticky-content fix-bottom">
                <a href="/" class="sticky-link active">
                    <i class="d-icon-home"></i>
                    <span>Home</span>
                </a>
                <a href="/shop" class="sticky-link">
                    <i class="d-icon-volume"></i>
                    <span>Categories</span>
                </a>
                <a href="/wishlist" class="sticky-link">
                    <i class="d-icon-heart"></i>
                    <span>Wishlist</span>
                </a>
                <a href="/account" class="sticky-link">
                    <i class="d-icon-user"></i>
                    <span>Account</span>
                </a>
                <div class="header-search hs-toggle dir-up">
                    <a href="#" class="search-toggle sticky-link">
                        <i class="d-icon-search"></i>
                        <span>Search</span>
                    </a>
                    <form action="#" class="input-wrapper">
                        <input type="text" class="form-control" name="search" autocomplete="off"
                        placeholder="Search your keyword..." required />
                        <button class="btn btn-search" type="submit">
                            <i class="d-icon-search"></i>
                        </button>
                    </form>
                </div>
            </div>
            <!-- Scroll Top -->
            <a id="scroll-top" href="#top" title="Top" role="button" class="scroll-top"><i class="d-icon-arrow-up"></i></a>

            <!-- MobileMenu -->
            <div class="mobile-menu-wrapper">
                <div class="mobile-menu-overlay">
                </div>
                <!-- End Overlay -->
                <a class="mobile-menu-close" href="#"><i class="d-icon-times"></i></a>
                <!-- End CloseButton -->
                <div class="mobile-menu-container scrollable">
                    <form action="#" class="input-wrapper">
                        <input type="text" class="form-control" name="search" autocomplete="off"
                        placeholder="Search your keyword..." required />
                        <button class="btn btn-search" type="submit">
                            <i class="d-icon-search"></i>
                        </button>
                    </form>
                    <!-- End Search Form -->
                    <div class="tab tab-nav-simple tab-nav-boxed form-tab mt-5">
                        <ul class="nav nav-tabs nav-fill" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" href="#menu">Categories</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="menu">
                                <ul class="mobile-menu mmenu-anim">
                                    @foreach($categories as $row)
                                    @php
                                    $sub_category = Helpers::getSubcategory($row->cat_id);
                                    @endphp
                                    <li>
                                        <a class="d-flex" href="/categories/{{ $row->cat_slug }}"><img src="{{ $baseurl."c_scale,w_20/".$row->cat_icon }}" width="20px"> &nbsp;&nbsp;{{  $row->cat_title }}</a>
                                        @if(count($sub_category)>0)
                                        <ul>
                                            @foreach($sub_category as $subrow)
                                            <li><a href="/sub-categories/{{ $subrow->sub_cat_slug }}">{{ $subrow->sub_cat_name }}</a></li>
                                            @endforeach
                                        </ul>
                                        @endif
                                    </li>
                                    @endforeach
                                    <li>
                                        <a href="#">Pages</a>
                                        <ul>
                                            <li><a href="/about-us">About</a></li>
                                            <li><a href="contact-us.html">Contact Us</a></li>
                                            <li><a href="account.html">My Account</a></li>
                                            <li><a href="wishlist.html">Wishlist</a></li>
                                            <li><a href="faq.html">FAQs</a></li>
                                            <li><a href="error-404.html">Error 404</a></li>
                                            <li><a href="coming-soon.html">Coming Soon</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Plugins JS File -->
            <script src="{{ asset('vendor/jquery/jquery.min.js')}}"></script>
            <script src="{{ asset('vendor/elevatezoom/jquery.elevatezoom.min.js')}}"></script>
            <script src="{{ asset('vendor/magnific-popup/jquery.magnific-popup.min.js')}}"></script>

            <script src="{{ asset('vendor/owl-carousel/owl.carousel.min.js')}}"></script>
            <script src="{{ asset('vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
            <script src="{{ asset('vendor/isotope/isotope.pkgd.min.js')}}"></script>
            <!-- Main JS File -->
            <script src="{{ asset('js/main.min.js')}}"></script>
            <script src="{{ asset('js/custom.js')}}"></script>
            <script src="{{ asset('js/cart.js')}}"></script>
            <script src="{{ asset('js/wishlist.js')}}"></script>
            @stack("fliter_js")
            <script type="text/javascript">
                $(function(){
                    Cart.initJQuery();
                    Wishlist.initJQuery();
                    toastr.options = {
                      "debug": false,
                      "positionClass": "toast-bottom-right",
                      "onclick": null,
                      "fadeIn": 300,
                      "fadeOut": 1000,
                      "timeOut": 5000,
                      "extendedTimeOut": 1000
                  };

              });

          </script>
          <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
      </body>
      </html>