<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Product;
use Illuminate\Http\Request;

class SpecialProductController extends Controller
{
    public function show_top_new()
    {
        $brands =Brand::all();
        $top_new_Product = Product::latest()->get();
        return view('admin.new_product.index',compact('brands','top_new_Product'));
    }
    public function show_top_hot()
    {
        $brands =Brand::all();
        $hot_Product = Product::where('is_hot', 1)->get();
        return view('admin.hot_product.index',compact('brands','hot_Product'));
    }
    public function show_top_seller()
    {
        $brands =Brand::all();
        $best_seller_Product = Product::where('is_best_seller', 1)->get();
        return view('admin.best_seller_product.index',compact('brands','best_seller_Product'));
    }
}
