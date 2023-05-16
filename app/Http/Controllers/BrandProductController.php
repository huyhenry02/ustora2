<?php

namespace App\Http\Controllers;
use App\Product;
use App\Brand;
use Illuminate\Http\Request;

class BrandProductController extends Controller
{


    public function products($id)
    {
        $brand = Brand::find($id);
        $products = $brand->products;

        return view('admin.brand-product.index', compact('products', 'brand'));
    }
}
