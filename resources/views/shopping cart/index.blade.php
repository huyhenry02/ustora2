@extends('admin.layout.main')
@section('content')
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Shopping Cart</h2>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Page title area -->


    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Search Products</h2>
                        <form action="#">
                            <input type="text" placeholder="Search products...">
                            <input type="submit" value="Search">
                        </form>
                    </div>

                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Products</h2>
                        <div class="thubmnail-recent">
                            <img src="/backend/img/product-thumb-1.jpg" class="recent-thumb" alt="">
                            <h2><a href="single-product.html">Sony Smart TV - 2015</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$700.00</ins> <del>$800.00</del>
                            </div>
                        </div>
                        <div class="thubmnail-recent">
                            <img src="/backend/img/product-thumb-1.jpg" class="recent-thumb" alt="">
                            <h2><a href="single-product.html">Sony Smart TV - 2015</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$700.00</ins> <del>$800.00</del>
                            </div>
                        </div>
                        <div class="thubmnail-recent">
                            <img src="/backend/img/product-thumb-1.jpg" class="recent-thumb" alt="">
                            <h2><a href="single-product.html">Sony Smart TV - 2015</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$700.00</ins> <del>$800.00</del>
                            </div>
                        </div>
                        <div class="thubmnail-recent">
                            <img src="/backend/img/product-thumb-1.jpg" class="recent-thumb" alt="">
                            <h2><a href="single-product.html">Sony Smart TV - 2015</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$700.00</ins> <del>$800.00</del>
                            </div>
                        </div>
                    </div>

                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Recent Posts</h2>
                        <ul>
                            <li><a href="#">Sony Smart TV - 2015</a></li>
                            <li><a href="#">Sony Smart TV - 2015</a></li>
                            <li><a href="#">Sony Smart TV - 2015</a></li>
                            <li><a href="#">Sony Smart TV - 2015</a></li>
                            <li><a href="#">Sony Smart TV - 2015</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-8">
                    @if(empty($cart))
                        <p>Giỏ hàng của bạn trống</p>
                    @else
                    <div class="product-content-right">

                        <div class="woocommerce">
                                <table cellspacing="0" class="shop_table cart">
                                    <thead>
                                    <tr>
                                        <th class="product-remove">&nbsp;</th>
                                        <th class="product-thumbnail">&nbsp;</th>
                                        <th class="product-name">Product</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-subtotal">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cart as $item)
                                    <tr class="cart_item">

                                        <td class="product-remove">
                                            <form action="{{ route('cart.delete') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $item['id'] }}">
                                                <button type="submit" class=" btn btn-danger">x</button>
                                            </form>
                                        </td>

                                        <td class="product-thumbnail">
                                            <a href="single-product.html"><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="{{asset($item['image'])}}"></a>
                                        </td>

                                        <td class="product-name">
                                            <a href="{{route('single-product.show',$item['id'])}}">{{ $item['name'] }}</a>
                                        </td>

                                        <td class="product-price">
                                            <span class="amount">{{ number_format($item['price'], 0, ',', '.')  }} VNĐ</span>
                                        </td>

                                        <td class="product-quantity">
                                            <div class="quantity buttons_added">
                                                <span class="quantity">{{ $item['quantity'] }}</span>
                                            </div>
                                        </td>

                                        <td class="product-subtotal">
                                            <span class="amount">{{ number_format($item['price'] * $item['quantity'], 0, ',','.') }} VNĐ</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="actions" colspan="6">
                                            <div class="coupon">
                                                <label for="coupon_code">Coupon:</label>
                                                <input type="text" placeholder="Coupon code" value="" id="coupon_code" class="input-text" name="coupon_code">
                                                <input type="submit" value="Apply Coupon" name="apply_coupon" class="button">
                                            </div>
{{--                                            <input type="submit" value="Update Cart" name="update_cart" class="button">--}}
                                            <form action="{{ route('cart.update', $item['id']) }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="productId" value="{{ $item['id'] }}">
                                                <input type="number" name="quantity" value="{{ $item['quantity'] }}" >
                                                <button class="button" type="submit">Update</button>
                                            </form>
{{--                                            <input type="submit" value="Checkout" name="proceed" class="checkout-button button alt wc-forward">--}}
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            <div class="cart-collaterals">



                                <div class="woocommerce-info">Billing Details <a class="showlogin" data-toggle="collapse" href="#login-form-wrap" aria-expanded="false" aria-controls="login-form-wrap">Click here to continue</a>
                                </div>




                                        <form enctype="multipart/form-data" action="{{route('order.save')}}" class="login collapse" method="post" name="checkout" id="login-form-wrap">
                                            @csrf
                                            <div id="customer_details" class="">
                                                <div class="">
                                                    <div class="woocommerce-billing-fields">
                                                        <h3>Billing Details</h3>

                                                        <p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                                            <label class="" for="billing_first_name">Full Name <abbr title="required" class="required">*</abbr>
                                                            </label>
                                                            <input type="text" value="" placeholder="" id="billing_first_name" name="fullname" class="input-text ">
                                                        </p>

                                                        <div class="clear"></div>
                                                        <p id="billing_address_1_field" class="form-row form-row-wide address-field validate-required">
                                                            <label class="" for="billing_address_1">Address <abbr title="required" class="required">*</abbr>
                                                            </label>
                                                            <input type="text" value="" placeholder="Street address" id="billing_address_1" name="address" class="input-text ">
                                                        </p>

                                                        <p id="billing_address_2_field" class="form-row form-row-wide address-field">
                                                            <input type="text" value="" placeholder="Apartment, suite, unit etc. (optional)" id="billing_address_2" name="address2" class="input-text ">
                                                        </p>

                                                        <div class="clear"></div>

                                                        <p id="billing_email_field" class="form-row form-row-first validate-required validate-email">
                                                            <label class="" for="billing_email">Email Address <abbr title="required" class="required">*</abbr>
                                                            </label>
                                                            <input type="text" value="" placeholder="" id="billing_email" name="email" class="input-text ">
                                                        </p>

                                                        <p id="billing_phone_field" class="form-row form-row-last validate-required validate-phone">
                                                            <label class="" for="billing_phone">Phone <abbr title="required" class="required">*</abbr>
                                                            </label>
                                                            <input type="text" value="" placeholder="" id="billing_phone" name="phone" class="input-text ">
                                                        </p>
                                                        <div class="clear"></div>
                                                        <p id="billing_phone_field" class="form-row form-row-last validate-required validate-phone">
                                                            <label class="" for="billing_phone">Note <abbr title="required" class="required">*</abbr>
                                                            </label>
                                                            <input type="text" value="" placeholder="" id="billing_phone" name="note" class="input-text ">
                                                        </p>
                                                        <div class="clear"></div>

{{--                                                        <div class="create-account">--}}
{{--                                                            <p>Create an account by entering the information below. If you are a returning customer please login at the top of the page.</p>--}}
{{--                                                            <p id="account_password_field" class="form-row validate-required">--}}
{{--                                                                <label class="" for="account_password">Account password <abbr title="required" class="required">*</abbr>--}}
{{--                                                                </label>--}}
{{--                                                                <input type="password" value="" placeholder="Password" id="account_password" name="password" class="input-text">--}}
{{--                                                            </p>--}}
{{--                                                            <div class="clear"></div>--}}
{{--                                                            <p id="account_password_field" class="form-row validate-required">--}}
{{--                                                                <label class="" for="account_password">Account Username <abbr title="required" class="required">*</abbr>--}}
{{--                                                                </label>--}}
{{--                                                                <input type="text" value="" placeholder="Username" id="account_password" name="username" class="input-text">--}}
{{--                                                            </p>--}}
{{--                                                            <div class="clear"></div>--}}
{{--                                                        </div>--}}

                                                    </div>
                                                </div>

                                            </div>

                                            <h3 id="order_review_heading">Your order</h3>

                                            <div id="order_review" style="position: relative;">

                                                <table class="shop_table">
                                                    <thead>
                                                    <tr>
                                                        <th class="product-name">Product</th>
                                                        <th class="product-total">Total</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                    <tfoot>

                                                    <tr class="cart-subtotal">
                                                        <th>Cart Subtotal</th>
                                                        <td><span class="amount">{{ number_format($totalPrice, 0, ',','.') }} VNĐ</span>
                                                        </td>
                                                    </tr>

                                                    <tr class="shipping">
                                                        <th>Shipping and Handling</th>
                                                        <td>

                                                            Free Shipping
                                                            <input type="hidden" class="shipping_method" value="free_shipping" id="shipping_method_0" data-index="0" name="shipping_method[0]">
                                                        </td>
                                                    </tr>


                                                    <tr class="order-total">
                                                        <th>Order Total</th>
                                                        <td><strong><span class="amount">{{ number_format($totalPrice, 0, ',','.') }} VNĐ</span></strong> </td>
                                                    </tr>

                                                    </tfoot>
                                                </table>



                                            </div>
                                            <div class="clear"></div>



                                    <div class="woocommerce-info">Have a coupon? <a class="showcoupon" data-toggle="collapse" href="#coupon-collapse-wrap" aria-expanded="false" aria-controls="coupon-collapse-wrap">Click here to enter your code</a>
                                    </div>



                                        <p class="form-row form-row-first">
                                            <input type="text" value="" id="coupon_code" placeholder="Coupon code" class="input-text" name="coupon_code">
                                        </p>

                                        <p class="form-row form-row-last">
                                            <input type="submit" value="Apply Coupon" name="apply_coupon" class="button">
                                        </p>

                                        <div class="clear"></div>


                                        <p><button class="button" value="1" name="calc_shipping" type="submit">Order </button></p>
                                </form>


                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>


@endsection
