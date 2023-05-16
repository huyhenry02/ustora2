@extends('admin.layout.main')
@section('content')

    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Your order</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="single-product-area"  style="">
        <div class="mainmenu-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <div class="navbar-collapse collapse">
                            <ul class="nav navbar-nav">
                                <li class="">
                                    <a href="{{route('ustora.order_by_customer')}}">All Orders
                                        <span class="product-count">{{$countOrders}}</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{route('order_by_customer.new')}}"> New Orders
                                        <span class="product-count">{{$countNewOrders}}</span>
                                    </a>

                                </li>

                                <li>
                                    <a href="{{route('order_by_customer.processing')}}">Processing Orders
                                        <span class="product-count">{{$countProcessingOrders}}</span>
                                    </a>

                                </li>

                                <li class="btn btn-secondary">
                                    <button type="button" class="btn btn-secondary"><a href="{{route('order_by_customer.confirmed')}}">Confirmed Orders
                                            <span class="product-count">{{$countConfirmedOrders}}</span>
                                        </a></button>


                                </li>

                                <li>
                                    <a href="{{route('order_by_customer.shipping')}}">Shipping Orders</a>
                                    <span class="product-count">{{$countShippingOrders}}</span>
                                </li>

                                <li>
                                    <a href="{{route('order_by_customer.successful_delivery')}}">Successful Orders
                                        <span class="product-count">{{$countSuccessfulOrders}}</span>
                                    </a>

                                </li>

                            </ul>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>

@endsection
