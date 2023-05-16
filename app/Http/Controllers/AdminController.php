<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Brand;
use App\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands =Brand::all();
//        $banner = Banner::find(26);
        $latestProducts = Product::latest()->take(10)->get();
        $hot_Product = Product::where('is_hot', 1)->take(3)->get();
//        dd($hot_Product);
        $best_seller_Product = Product::where('is_best_seller', 1)->take(3)->get();
//        dd($best_seller_Product);
        $top_new_Product = Product::latest()->take(3)->get();
        return view('admin.index',[
            'brands'=>$brands,
            'latestProducts'=>$latestProducts,
            'hot_Product'=>$hot_Product,
            'best_seller_Product'=>$best_seller_Product,
            'top_new_Product'=>$top_new_Product
                                       ]);

    }


}
