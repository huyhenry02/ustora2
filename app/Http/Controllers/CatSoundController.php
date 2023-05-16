<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Product;
use Illuminate\Http\Request;

class CatSoundController extends Controller
{
    public function index()
    {
        return view('admin.category.sound.index');

    }


    public function show_brand()
    {
        $data = Brand::all();
        $products = Product::where('category_id', '=', 64)->get();
        return view('admin.category.sound.index', ['data' => $data, 'products' => $products]);

    }
}
