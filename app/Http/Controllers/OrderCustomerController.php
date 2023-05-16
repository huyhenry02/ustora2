<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OrderCustomerController extends Controller
{
     public function countOrders(){
         $customer_id = Auth::guard('customer')->user()->id;
         $orders = Order::where('customer_id', $customer_id)->get();
         $count = count($orders);
         return $count;
    }
    public function countNewOrders(){
        $customer_id = Auth::guard('customer')->user()->id;
        $count = Order::where('customer_id', $customer_id)->where('order_status_id', '=', 1)->count();
        return $count;
    }
    public function countProcessingOrders(){
         $customer_id = Auth::guard('customer')->user()->id;
         $count = Order::where('customer_id', $customer_id)->where('order_status_id', '=', 2)->count();
         return $count;
}
    public function countConfirmedOrders(){
        $customer_id = Auth::guard('customer')->user()->id;
        $count = Order::where('customer_id', $customer_id)->where('order_status_id', '=', 3)->count();
        return $count;
    }
    public function countShippingOrders(){
        $customer_id = Auth::guard('customer')->user()->id;
        $count = Order::where('customer_id', $customer_id)->where('order_status_id', '=', 4)->count();
        return $count;
    }
    public function countSuccessfulOrders(){
        $customer_id = Auth::guard('customer')->user()->id;
        $count = Order::where('customer_id', $customer_id)->where('order_status_id', '=', 5)->count();
        return $count;
    }
    public function show_order_by_customer(){
        $customer_id = Auth::guard('customer')->user()->id;
        $orders = Order::where('customer_id', $customer_id)->get();
//        dd($orders);
        $countOrders = $this->countOrders();
        $countNewOrders = $this->countNewOrders();
        $countProcessingOrders = $this->countProcessingOrders();
        $countConfirmedOrders = $this->countConfirmedOrders();
        $countShippingOrders = $this->countShippingOrders();
        $countSuccessfulOrders = $this->countSuccessfulOrders();
        return view('admin.order.customer.index',[
            'orders'=>$orders,
            'countOrders'=>$countOrders,
            'countNewOrders'=>$countNewOrders,
            'countProcessingOrders'=>$countProcessingOrders,
            'countConfirmedOrders'=>$countConfirmedOrders,
            'countShippingOrders'=>$countShippingOrders,
            'countSuccessfulOrders'=>$countSuccessfulOrders

        ]);
    }
    public function show_new(){
        $customer_id = Auth::guard('customer')->user()->id;
        $news = Order::where('customer_id', $customer_id)->where('order_status_id', '=', 1)->get();
        $countOrders = $this->countOrders();
        $countNewOrders = $this->countNewOrders();
        $countProcessingOrders = $this->countProcessingOrders();
        $countConfirmedOrders = $this->countConfirmedOrders();
        $countShippingOrders = $this->countShippingOrders();
        $countSuccessfulOrders = $this->countSuccessfulOrders();
        return view('admin.order.customer.new',[
            'news'=>$news,
            'countOrders'=>$countOrders,
            'countNewOrders'=>$countNewOrders,
            'countProcessingOrders'=>$countProcessingOrders,
            'countConfirmedOrders'=>$countConfirmedOrders,
            'countShippingOrders'=>$countShippingOrders,
            'countSuccessfulOrders'=>$countSuccessfulOrders
        ]);
    }
    public function show_processing(){
        $customer_id = Auth::guard('customer')->user()->id;
        $processing = Order::where('customer_id', $customer_id)->where('order_status_id', '=', 2)->get();
        $countOrders = $this->countOrders();
        $countNewOrders = $this->countNewOrders();
        $countProcessingOrders = $this->countProcessingOrders();
        $countConfirmedOrders = $this->countConfirmedOrders();
        $countShippingOrders = $this->countShippingOrders();
        $countSuccessfulOrders = $this->countSuccessfulOrders();

        return view('admin.order.customer.processing',[
            'processing'=>$processing,
            'countOrders'=>$countOrders,
            'countNewOrders'=>$countNewOrders,
            'countProcessingOrders'=>$countProcessingOrders,
            'countConfirmedOrders'=>$countConfirmedOrders,
            'countShippingOrders'=>$countShippingOrders,
            'countSuccessfulOrders'=>$countSuccessfulOrders

        ]);
    }
    public function show_confirmed(){
        $customer_id = Auth::guard('customer')->user()->id;
        $confirmed = Order::where('customer_id', $customer_id)->where('order_status_id', '=', 3)->get();
        $countOrders = $this->countOrders();
        $countNewOrders = $this->countNewOrders();
        $countProcessingOrders = $this->countProcessingOrders();
        $countConfirmedOrders = $this->countConfirmedOrders();
        $countShippingOrders = $this->countShippingOrders();
        $countSuccessfulOrders = $this->countSuccessfulOrders();
        return view('admin.order.customer.confirmed',
        [
            'confirmed'=>$confirmed,
            'countOrders'=>$countOrders,
            'countNewOrders'=>$countNewOrders,
            'countProcessingOrders'=>$countProcessingOrders,
            'countConfirmedOrders'=>$countConfirmedOrders,
            'countShippingOrders'=>$countShippingOrders,
            'countSuccessfulOrders'=>$countSuccessfulOrders
        ]
        );
    }
    public function show_shipping(){
        $customer_id = Auth::guard('customer')->user()->id;
        $shipping = Order::where('customer_id', $customer_id)->where('order_status_id', '=', 4)->get();
        $countOrders = $this->countOrders();
        $countNewOrders = $this->countNewOrders();
        $countProcessingOrders = $this->countProcessingOrders();
        $countConfirmedOrders = $this->countConfirmedOrders();
        $countShippingOrders = $this->countShippingOrders();
        $countSuccessfulOrders = $this->countSuccessfulOrders();
        return view('admin.order.customer.shipping',
            [
                'shipping'=>$shipping,
                'countOrders'=>$countOrders,
                'countNewOrders'=>$countNewOrders,
                'countProcessingOrders'=>$countProcessingOrders,
                'countConfirmedOrders'=>$countConfirmedOrders,
                'countShippingOrders'=>$countShippingOrders,
                'countSuccessfulOrders'=>$countSuccessfulOrders

            ]
        );
    }
    public function show_successful_delivery(){
        $customer_id = Auth::guard('customer')->user()->id;
        $successful = Order::where('customer_id', $customer_id)->where('order_status_id', '=', 5)->get();
        $countOrders = $this->countOrders();
        $countNewOrders = $this->countNewOrders();
        $countProcessingOrders = $this->countProcessingOrders();
        $countConfirmedOrders = $this->countConfirmedOrders();
        $countShippingOrders = $this->countShippingOrders();
        $countSuccessfulOrders = $this->countSuccessfulOrders();
        return view('admin.order.customer.successful',
            [
                'successful'=>$successful,
                'countOrders'=>$countOrders,
                'countNewOrders'=>$countNewOrders,
                'countProcessingOrders'=>$countProcessingOrders,
                'countConfirmedOrders'=>$countConfirmedOrders,
                'countShippingOrders'=>$countShippingOrders,
                'countSuccessfulOrders'=>$countSuccessfulOrders

            ]
        );
    }
}
