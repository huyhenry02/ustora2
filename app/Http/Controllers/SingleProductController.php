<?php

namespace App\Http\Controllers;

use App\Product;
use App\Rating;
use Illuminate\Http\Request;

class SingleProductController extends Controller
{
    public function show($id)
    {
        $product = Product::find($id);

//        $ratings = Rating::where('product_id', $id)->get();
        return view('admin.single-product.index',compact('product'));
    }

    public function submitRating(Request $request, string $id)
    {
        $rating = new Rating();
        $rating->product_id =$request->input('product_id');
        $rating->name =$request->input('name');
        $rating->phone =$request->input('phone');
        $rating->email =$request->input('email');
        $rating->title =$request->input('title');
        $rating->ra_number =$request->input('ra_number');
        $rating->save();
        return redirect("ustora/single-product/$id");
    }

}
