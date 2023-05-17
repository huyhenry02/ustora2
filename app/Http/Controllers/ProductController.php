<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {

       $data = Product::with('category')->get()->sortByDesc('category.name');
       return view('quan-tri.product.index',['data'=>$data]);

    }
    public function show_create_product()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('quan-tri.product.create',compact('categories','brands'));
    }
    public function create_product(Request $request)
    {
//        $validated = $request->validate([
//            'name' => 'required|max:255|min:5|unique:brands',
//            'website' => 'required|max:255|min:5|unique:brands',
//            'image' => 'required|image|mimes: jpeg,png,jpg,gif,svg',
//        ], [
//            'name.required' => 'Tên không được để trống',
//            'name.min' => 'tên không được dưới 5 ký tự',
//            'image.mimes' => 'Không đúng định dạng',
//            'image.image' => 'Không đúng định dạng',
//
//        ]);

        $data = new Product();
        $data->name = $request->name;
        $data->price = $request->price;

        $data->slug = str_slug($request->name);
        //kiểm tra File update lên
        if ($request->hasFile('image')) {
            //get file
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            //đường dẫn upload
            $path_upload = 'uploads/product/';
            $request->file('image')->move($path_upload, $filename);
            $data->image = $path_upload . $filename;

        }

        $data->category_id = $request->category_id;
        $data->save();
        $product = Product::find($data->id);
        $product->brands()->attach($request->input('brand_id'));
        $product->save();
        return redirect('quan-tri/product');

    }
    public function edit($id)
    {
        $data = Product::find($id);
//        dd($data);
        $categories = Category::all();
//        dd($categories);
        $brands = Brand::all();
        return view('quan-tri.product.edit', compact('data','categories','brands'));
    }
    public function update(Request $request,$id)
    {
//        $validated = $request->validate([
//            'name' => 'required|max:255|min:5|unique:brands',
//            'website' => 'required|max:255|min:5|unique:brands',
//            'image' => 'required|image|mimes: jpeg,png,jpg,gif,svg',
//        ], [
//            'name.required' => 'Tên không được để trống',
//            'name.min' => 'tên không được dưới 5 ký tự',
//            'image.mimes' => 'Không đúng định dạng',
//            'image.image' => 'Không đúng định dạng',
//
//        ]);
        $data = Product::find($id);
        $data->name = $request->name;
        $data->price = $request->price;
        $data->slug = str_slug($request->name);
        $data->is_hot = $request->has('is_hot') ? true : false;
        $data->is_best_seller = $request->has('is_best_seller') ? true : false;
        $data->is_active = $request->has('is_active') ? true : false;
        //kiểm tra File update lên
        if ($request->hasFile('image')) {
            //get file
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            //đường dẫn upload
            $path_upload = 'uploads/product/';
            $request->file('image')->move($path_upload, $filename);
            $data->image = $path_upload . $filename;
        }
        $data->category_id = $request->category_id;
        $data->save();
        $product = Product::find($data->id);
        $product->brands()->attach($request->input('brand_id'));
        $data->save();

        return redirect('quan-tri/product');
    }
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect('quan-tri/product');
    }
}
