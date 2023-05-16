<!DOCTYPE html>
<!--
	ustora by freshdesignweb.com
	Twitter: https://twitter.com/freshdesignweb
	URL: https://www.freshdesignweb.com/ustora/
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ustora Demo</title>

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="/backend/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="/backend/css/font-awesome.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="/backend/css/owl.carousel.css">
    <link rel="stylesheet" href="/backend/style.css">
    <link rel="stylesheet" href="/backend/css/responsive.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

@if(session()->has('success_login'))
    <div class="alert alert-success">
        {{ session()->get('success_login') }}
    </div>
@endif
@if(session()->has('error_logout'))
    <div class="alert alert-danger">
        {{ session()->get('error_logout') }}
    </div>
@endif
<div class="header-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="user-menu">
                    <ul>
                        @if(auth()->guard('customer')->check())
                        <li><a href="{{URL::to('ustora/register')}}"><i class="fa fa-user"></i> {{auth()->guard('customer')->user()->name }}</a></li>
                        @else
                            <li><a href="#"><i class="fa fa-user"></i> Name Customer</a></li>
                        @endif
                        <li><a href="#"><i class="fa fa-heart"></i> Wishlist</a></li>
                        <li><a href="{{URL::to('ustora/cart')}}"><i class="fa fa-user"></i> My Cart</a></li>
                        <li><a href="checkout.html"><i class="fa fa-user"></i> Checkout</a></li>
                        <li><a href="{{URL::to('ustora/register')}}"><i class="fa fa-user"></i> Login</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-4">
                <div class="header-right">
                    <ul class="list-unstyled list-inline">
                        @if(auth()->guard('customer')->check())
                        <li class="dropdown dropdown-small">
                            <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">{{auth()->guard('customer')->user()->name }}</span></a>
                            <ul class="dropdown-menu">
                                <li> <a href="{{route('ustora.customer_logout')}}" class="btn btn-default btn-flat">Sign out</a></li>
                            </ul>
                        </li>
                        @else
                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="{{URL::to('ustora/register')}}"><span class="key">Name Cusstomer</span></a>
                                <ul class="dropdown-menu">
                                    <li> <a href="{{route('ustora.customer_logout')}}" class="btn btn-default btn-flat">Sign out</a></li>
                                </ul>
                            </li>
                        @endif
                        <li class="dropdown dropdown-small">
                            <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">language :</span><span class="value">English </span><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">English</a></li>
                                <li><a href="#">Vietnamese</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End header area -->

<div class="site-branding-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="logo">
                    <h1><a href="#"><img src="/backend/img/logo.png"></a></h1>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="shopping-item">
                    <a href="{{URL::to('/ustora/cart')}}">Cart - <i class="fa fa-shopping-cart"></i>
                        @if(session()->has('cart'))
                            <span class="product-count">{{ count(session('cart')) }}</span></a>
                    @else
                        <span class="product-count">0</span>
                        @endif
                        </a>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End site branding area -->

<div class="mainmenu-area">
    <div class="container">
        <div class="row">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="{{URL::to('/ustora')}}">Home</a>

                    </li>

                    <li><a href="{{URL::to('/ustora/category-phone')}}">Phones </a>

                    </li>

                    <li><a href="{{URL::to('/ustora/category-laptop')}}">Laptops </a>

                    </li>

                    <li><a href="{{URL::to('/ustora/category-tivi')}}">Television</a>

                    </li>

                    <li><a href="{{URL::to('/ustora/category-watch')}}">Watch</a>

                    </li>

                    <li><a href="{{URL::to('/ustora/category-accessory')}}">Accessories</a>

                    </li>

                    <li><a href="{{URL::to('/ustora/category-sound')}}">Sounds</a>

                    </li>
                    <li><a href="#">Contact</a>

                    </li>
                </ul>
            </div>
        </div>
    </div>
</div> <!-- End mainmenu area -->

<div class="slider-area">
    <!-- Slider -->
    <div class="block-slider block-slider4">
        <ul class="" id="bxslider-home4">
            <li>
                <img src="/backend/img/h4-slide.png" alt="Slide">
{{--                @if ($image && is_object($image) && $image->file)--}}
{{--                    <img src="{{ asset($image->file) }}" alt="{{ $image->title }}">--}}
{{--                @endif--}}

                <div class="caption-group">
                    <h2 class="caption title">
                        iPhone <span class="primary">6 <strong>Plus</strong></span>
                    </h2>
                    <h4 class="caption subtitle">Dual SIM</h4>
                    <a class="caption button-radius" href="#"><span class="icon"></span>Shop now</a>
                </div>
            </li>
            <li><img src="/backend/img/h4-slide2.png" alt="Slide">
                <div class="caption-group">
                    <h2 class="caption title">
                        by one, get one <span class="primary">50% <strong>off</strong></span>
                    </h2>
                    <h4 class="caption subtitle">school supplies & backpacks.*</h4>
                    <a class="caption button-radius" href="#"><span class="icon"></span>Shop now</a>
                </div>
            </li>
            <li><img src="/backend/img/h4-slide3.png" alt="Slide">
                <div class="caption-group">
                    <h2 class="caption title">
                        Apple <span class="primary">Store <strong>Ipod</strong></span>
                    </h2>
                    <h4 class="caption subtitle">Select Item</h4>
                    <a class="caption button-radius" href="#"><span class="icon"></span>Shop now</a>
                </div>
            </li>
            <li><img src="/backend/img/h4-slide4.png" alt="Slide">
                <div class="caption-group">
                    <h2 class="caption title">
                        Apple <span class="primary">Store <strong>Ipod</strong></span>
                    </h2>
                    <h4 class="caption subtitle">& Phone</h4>
                    <a class="caption button-radius" href="#"><span class="icon"></span>Shop now</a>
                </div>
            </li>
        </ul>
    </div>
    <!-- ./Slider -->
</div> <!-- End slider area -->

<div class="promo-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="single-promo promo1">
                    <i class="fa fa-refresh"></i>
                    <p>30 Days return</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="single-promo promo2">
                    <i class="fa fa-truck"></i>
                    <p>Free shipping</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="single-promo promo3">
                    <i class="fa fa-lock"></i>
                    <p>Secure payments</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="single-promo promo4">
                    <i class="fa fa-gift"></i>
                    <p>New products</p>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End promo area -->

<div class="maincontent-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="latest-product">
                    <h2 class="section-title">Latest Products</h2>
                    <div class="product-carousel">
                        @foreach( $latestProducts as $key => $val)
                        <div class="single-product">

                                <div class="product-f-image">
                                    <img src="{{asset($val->image)}}" alt="">
                                    <div class="product-hover">
                                        <a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                        <a href="{{route('single-product.show',$val->id)}}" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                    </div>
                                </div>

                                <h2><a href="{{route('single-product.show',$val->id)}}">{{ $val ? $val->name : '' }}</a></h2>

                                <div class="product-carousel-price">
                                    <ins>{{ $val ? $val->sale : '' }} VNĐ</ins> <del>{{ $val ? $val->price : '' }} VNĐ</del>
                                </div>

                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End main content area -->

<div class="brands-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="brand-wrapper">
                    <div class="brand-list">
                        @foreach($brands as $key=>$val)
                            <a href="{{ $val ? $val->website : '' }}">
                                <img  src="{{asset($val->image)}}" alt="Not image" >
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End brands area -->

<div class="product-widget-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="single-product-widget">
                    <h2 class="product-wid-title">Top Sellers</h2>
                    <a href="{{route('special_product.top_seller')}}" class="wid-view-more">View All</a>

                    @foreach($best_seller_Product as $key=>$val)
                        <div class="single-wid-product">
                            <a href="{{route('single-product.show',$val->id)}}"><img src="{{asset($val->image)}}" alt="" class="product-thumb"></a>
                            <h2><a href="{{route('single-product.show',$val->id)}}">{{$val->name}}</a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins>{{ $val ? number_format($val->sale, 0, ',', '.') : '' }} VNĐ</ins> <del>{{ $val ?  number_format($val->price, 0, ',', '.')   : '' }} VNĐ</del>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
            <div class="col-md-4">
                <div class="single-product-widget">
                    <h2 class="product-wid-title">Top Product</h2>
                    <a href="{{route('special_product.top_hot')}}" class="wid-view-more">View All</a>
                    @foreach($hot_Product as $key=>$val)
                        <div class="single-wid-product">
                            <a href="{{route('single-product.show',$val->id)}}"><img src="{{asset($val->image)}}" alt="" class="product-thumb"></a>
                            <h2><a href="{{route('single-product.show',$val->id)}}">{{$val->name}}</a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins>{{ $val ? number_format($val->sale, 0, ',', '.') : '' }} VNĐ</ins> <del>{{ $val ?  number_format($val->price, 0, ',', '.')   : '' }} VNĐ</del>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
            <div class="col-md-4">
                <div class="single-product-widget">
                    <h2 class="product-wid-title">Top New</h2>
                    <a href="{{route('special_product.top_seller')}}" class="wid-view-more">View All</a>
                    @foreach($top_new_Product as $key=>$val)
                    <div class="single-wid-product">
                        <a href="{{route('single-product.show',$val->id)}}"><img src="{{asset($val->image)}}" alt="" class="product-thumb"></a>
                        <h2><a href="{{route('single-product.show',$val->id)}}">{{$val->name}}</a></h2>
                        <div class="product-wid-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="product-wid-price">
                            <ins>{{ $val ? number_format($val->sale, 0, ',', '.') : '' }} VNĐ</ins> <del>{{ $val ?  number_format($val->price, 0, ',', '.')   : '' }} VNĐ</del>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div> <!-- End product widget area -->

<div class="footer-top-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="footer-about-us">
                    <h2>u<span>Stora</span></h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis sunt id doloribus vero quam laborum quas alias dolores blanditiis iusto consequatur, modi aliquid eveniet eligendi iure eaque ipsam iste, pariatur omnis sint! Suscipit, debitis, quisquam. Laborum commodi veritatis magni at?</p>
                    <div class="footer-social">
                        <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                        <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                        <a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
                        <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="footer-menu">
                    <h2 class="footer-wid-title">User Navigation </h2>
                    <ul>
                        <li><a href="#">My account</a></li>
                        <li><a href="#">Order history</a></li>
                        <li><a href="#">Wishlist</a></li>
                        <li><a href="#">Vendor contact</a></li>
                        <li><a href="#">Front page</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="footer-menu">
                    <h2 class="footer-wid-title">Categories</h2>
                    <ul>
                        <li><a href="#">Mobile Phone</a></li>
                        <li><a href="#">Home accesseries</a></li>
                        <li><a href="#">LED TV</a></li>
                        <li><a href="#">Computer</a></li>
                        <li><a href="#">Gadets</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="footer-newsletter">
                    <h2 class="footer-wid-title">Newsletter</h2>
                    <p>Sign up to our newsletter and get exclusive deals you wont find anywhere else straight to your inbox!</p>
                    <div class="newsletter-form">
                        <form action="#">
                            <input type="email" placeholder="Type your email">
                            <input type="submit" value="Subscribe">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End footer top area -->

<div class="footer-bottom-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="copyright">
                    <p>Design by D_Huy02 <a href="https://www.facebook.com/huyhenry120203" target="_blank">sandbox.duchuy02@gmail.com</a></p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="footer-card-icon">
                    <i class="fa fa-cc-discover"></i>
                    <i class="fa fa-cc-mastercard"></i>
                    <i class="fa fa-cc-paypal"></i>
                    <i class="fa fa-cc-visa"></i>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End footer bottom area -->

<!-- Latest jQuery form server -->
<script src="https://code.jquery.com/jquery.min.js"></script>

<!-- Bootstrap JS form CDN -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<!-- jQuery sticky menu -->
<script src="/backend/js/owl.carousel.min.js"></script>
<script src="/backend/js/jquery.sticky.js"></script>

<!-- jQuery easing -->
<script src="/backend/js/jquery.easing.1.3.min.js"></script>

<!-- Main Script -->
<script src="/backend/js/main.js"></script>

<!-- Slider -->
<script type="text/javascript" src="/backend/js/bxslider.min.js"></script>
<script type="text/javascript" src="/backend/js/script.slider.js"></script>
</body>
</html>
