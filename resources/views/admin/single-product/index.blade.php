@extends('admin.layout.main')
@section('content')
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Shop</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Search Products</h2>
                        <form action="">
                            <input type="text" placeholder="Search products...">
                            <input type="submit" value="Search">
                        </form>
                    </div>

                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Products</h2>
                        <div class="thubmnail-recent">
                            <img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">
                            <h2><a href="">Sony Smart TV - 2015</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$700.00</ins> <del>$100.00</del>
                            </div>
                        </div>
                        <div class="thubmnail-recent">
                            <img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">
                            <h2><a href="">Sony Smart TV - 2015</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$700.00</ins> <del>$100.00</del>
                            </div>
                        </div>
                        <div class="thubmnail-recent">
                            <img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">
                            <h2><a href="">Sony Smart TV - 2015</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$700.00</ins> <del>$100.00</del>
                            </div>
                        </div>
                        <div class="thubmnail-recent">
                            <img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">
                            <h2><a href="">Sony Smart TV - 2015</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$700.00</ins> <del>$100.00</del>
                            </div>
                        </div>
                    </div>

                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Recent Posts</h2>
                        <ul>
                            <li><a href="">Sony Smart TV - 2015</a></li>
                            <li><a href="">Sony Smart TV - 2015</a></li>
                            <li><a href="">Sony Smart TV - 2015</a></li>
                            <li><a href="">Sony Smart TV - 2015</a></li>
                            <li><a href="">Sony Smart TV - 2015</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="product-content-right">

                            <div class="product-breadcroumb">
                                <a href="{{URL::to('ustora')}}">Home</a>
                                <a href="">{{ $product->category->name }}</a>
                                <a href="">{{ $product->name }}</a>
                            </div>


                        <div class="row">
                            <div class="col-sm-6">

                                    <div class="product-images">
                                        <div class="product-main-img">
                                            <img src="{{asset($product->image)}}" alt="">
                                        </div>

                                        <div class="product-gallery">
                                            <img src="{{asset($product->image)}}" alt="">
                                            <img src="{{asset($product->image)}}" alt="">
                                            <img src="{{asset($product->image)}}" alt="">
                                        </div>
                                    </div>

                            </div>


                                <div class="col-sm-6">
                                    <div class="product-inner">
                                        <h2 class="product-name">{{ $product->name }}</h2>
                                        <div class="product-inner-price">
                                            <ins>{{ number_format($product->sale, 0, ',', '.')  }} VNĐ</ins> <del>{{ number_format($product->price, 0, ',', '.')  }} VNĐ</del>
                                        </div>
                                        <form action="{{ route('cart.add') }}" method="post" class="cart">
                                            @csrf
                                            <div class="quantity">
                                                <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                                            </div>
                                            <input type="hidden" name="id" value="{{ $product->id }}">
                                            <button class="add_to_cart_button" type="submit">Add to cart</button>
                                        </form>

                                        <div class="product-inner-category">
                                            <p>Category: <a href=""></a>. {{ $product->category->name }} </p>
                                        </div>

                                        <div role="tabpanel">
                                            <ul class="product-tab" role="tablist">
                                                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>
                                                <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Reviews</a></li>
                                            </ul>
                                            <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                    <h2> Description</h2>
                                                    <p>{{ $product->description }}</p>

                                                </div>
                                                <div role="tabpanel" class="tab-pane fade" id="profile">
                                                    <h2>Reviews</h2>
                                                    <form action="{{route('single-product.review.submit', ['id' => $product->id])}}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="product_id" value="">
                                                        <div class="submit-review">
                                                            <p><label for="name">Name</label> <input name="name" type="text"></p>
                                                            <p><label for="email">Email</label> <input name="email" type="email"></p>
                                                            <p><label for="phone">Phone</label> <input name="phone" type="text"></p>
                                                            <div class="rating-chooser">
                                                                <p>Your rating</p>

                                                                <div class="rating-wrap-post">
                                                                    <select id="ra_number" name="ra_number">
                                                                        <option value="1">1 sao</option>
                                                                        <option value="2">2 sao</option>
                                                                        <option value="3">3 sao</option>
                                                                        <option value="4">4 sao</option>
                                                                        <option value="5">5 sao</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <p><label for="review">Your review</label> <textarea name="title" id="title" cols="30" rows="10"></textarea></p>
                                                            <p><input type="submit" value="Submit"></p>
                                                        </div>
                                                    </form>


                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            <h2>Reviewer</h2>
{{--                            @if ($reviews->count() > 0)--}}
{{--                                <ul>--}}
{{--                                    @foreach ($reviews as $review)--}}
{{--                                        <li>{{ $review->user->name }} đánh giá {{ $review->rating }} sao</li>--}}
{{--                                        <li>{{ $review->comment }}</li>--}}
{{--                                    @endforeach--}}
{{--                                </ul>--}}
{{--                            @else--}}
{{--                                <p>Chưa có đánh giá nào cho sản phẩm này.</p>--}}
{{--                            @endif--}}
                            <div class="review-section" >
                                <ul class="review-list">
                                    <li class="review-item">
                                        <div class="reviewer-info">
                                            <h3 class="reviewer-name">Nguyễn Văn A</h3>
                                            <p class="reviewer-date">Ngày đăng: 30/03/2023</p>
                                        </div>
                                        <div class="review-content">
                                            <p class="review-text">Sản phẩm rất tốt và đáp ứng được mong đợi của tôi. Tôi rất hài lòng với chất lượng của sản phẩm.</p>
                                            <div class="review-rating">
                                                <span class="rating-star">&#9733;</span>/<span class="rating-star">&#9733;</span><span class="rating-star">&#9733;</span><span class="rating-star">&#9733;</span><span class="rating-star">&#9733;</span><span class="rating-star">&#9733;</span>

                                            </div>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </div>


                        <div class="related-products-wrapper">
                            <h2 class="related-products-title">Related Products</h2>
                            <div class="related-products-carousel">
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="img/product-1.jpg" alt="">
                                        <div class="product-hover">
                                            <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                            <a href="" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                        </div>
                                    </div>

                                    <h2><a href="">Sony Smart TV - 2015</a></h2>

                                    <div class="product-carousel-price">
                                        <ins>$700.00</ins> <del>$100.00</del>
                                    </div>
                                </div>
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="img/product-2.jpg" alt="">
                                        <div class="product-hover">
                                            <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                            <a href="" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                        </div>
                                    </div>

                                    <h2><a href="">Apple new mac book 2015 March :P</a></h2>
                                    <div class="product-carousel-price">
                                        <ins>$899.00</ins> <del>$999.00</del>
                                    </div>
                                </div>
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="img/product-3.jpg" alt="">
                                        <div class="product-hover">
                                            <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                            <a href="" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                        </div>
                                    </div>

                                    <h2><a href="">Apple new i phone 6</a></h2>

                                    <div class="product-carousel-price">
                                        <ins>$400.00</ins> <del>$425.00</del>
                                    </div>
                                </div>
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="img/product-4.jpg" alt="">
                                        <div class="product-hover">
                                            <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                            <a href="" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                        </div>
                                    </div>

                                    <h2><a href="">Sony playstation microsoft</a></h2>

                                    <div class="product-carousel-price">
                                        <ins>$200.00</ins> <del>$225.00</del>
                                    </div>
                                </div>
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="img/product-5.jpg" alt="">
                                        <div class="product-hover">
                                            <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                            <a href="" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                        </div>
                                    </div>

                                    <h2><a href="">Sony Smart Air Condtion</a></h2>

                                    <div class="product-carousel-price">
                                        <ins>$1200.00</ins> <del>$1355.00</del>
                                    </div>
                                </div>
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="img/product-6.jpg" alt="">
                                        <div class="product-hover">
                                            <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                            <a href="" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                        </div>
                                    </div>

                                    <h2><a href="">Samsung gallaxy note 4</a></h2>

                                    <div class="product-carousel-price">
                                        <ins>$400.00</ins>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
