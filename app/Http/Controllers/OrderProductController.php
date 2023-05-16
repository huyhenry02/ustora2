<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class OrderProductController extends Controller
{
    public function show_order(){
        $latestProducts = Product::latest()->take(10)->get();
        $best_seller_Product = Product::where('is_best_seller', 1)->take(3)->get();
        return view('admin.order.index',[
            'latestProducts'=>$latestProducts,
            'best_seller_Product'=>$best_seller_Product
        ]);
    }
}
