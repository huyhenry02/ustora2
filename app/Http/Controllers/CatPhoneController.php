<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Product;
use Illuminate\Http\Request;

class CatPhoneController extends Controller
{
    public function show_brand()
    {
        $data = Brand::all();
        $products = Product::where('category_id', '=', 60)->paginate(8);
        return view('admin.category.phone.index', ['data' => $data, 'products' => $products]);

    }
}
