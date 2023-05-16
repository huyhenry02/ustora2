<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Product;
use Illuminate\Http\Request;

class CatWatchController extends Controller
{
    public function index()
    {
        return view('admin.category.watch.index');

    }


    public function show_brand()
    {
        $data = Brand::all();
        $products = Product::where('category_id', '=', 65)->get();
        return view('admin.category.watch.index', ['data' => $data, 'products' => $products]);

    }
}
