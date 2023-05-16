<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Product;
use Illuminate\Http\Request;

class CatAccessoryController extends Controller
{
    public function index()
    {
        return view('admin.category.accessory.index');

    }


    public function show_brand()
    {
        $data = Brand::all();
        $products = Product::where('category_id', '=', 66)->get();
        return view('admin.category.accessory.index', ['data' => $data, 'products' => $products]);

    }
}
