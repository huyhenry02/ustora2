
<div class="header-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="user-menu">
                    <ul>
                        @if(auth()->guard('customer')->check())
                            <li><a href="{{URL::to('ustora/register')}}"><i class="fa fa-user"></i> {{auth()->guard('customer')->user()->name }}</a></li>
                        @else
                            <li><a href="#"><i class="fa fa-user"></i> My Acount</a></li>
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
                                    <li> <a href="{{route('ustora.order_by_customer')}}" class="btn btn-default btn-flat">Your Order</a></li>
                                </ul>


                            </li>
                        @else
                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="{{URL::to('ustora/register')}}"><span class="key">My Account</span></a>
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
                    <h1><a href="./"><img src="/backend/img/logo.png"></a></h1>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="shopping-item">

                    <a href="{{URL::to('ustora/cart')}}">Cart <i class="fa fa-shopping-cart"></i>
                        @if(session()->has('cart'))
                        <span class="product-count">{{ count(session('cart')) }}</span></a>
                    @else
                        <span class="product-count">0</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div> <!-- End site branding area -->


