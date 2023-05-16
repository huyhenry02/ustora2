@extends('admin.layout.main')
@section('content')

    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Television</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="brands-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="brand-wrapper">
                        <div class="brand-list">
                            @foreach($data as $key=>$val)
                                <a href="{{ route('brand_of_product.name', ['id' => $val->id]) }}">
                                    <img  src="{{asset($val->image)}}" alt="Not image" >
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End brands area -->


    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                @foreach($products as $key=>$val)
                    <div class="col-md-3 col-sm-6">
                        <div class="single-shop-product">
                            <div class="product-upper">
                                <img src="{{asset($val->image)}}" alt="">
                            </div>
                            <h2><a href="{{route('single-product.show',$val->id)}}">{{ $val ? $val->name : '' }}</a></h2>
                            <div class="product-carousel-price">
                                <ins>{{ $val ? $val->sale : '' }} VNĐ</ins> <del>{{ $val ? $val->price : '' }} VNĐ</del>
                            </div>

                            <form action="{{ route('cart.add') }}" method="POST" class="product-option-shop">
                                @csrf
                                <input type="hidden" name="id" value="{{ $val->id }}">
                                <button type="submit" class="add_to_cart_button">Add To Cart</button>
                            </form>
                        </div>
                    </div>
                @endforeach

            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="product-pagination text-center">
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
@endsection
