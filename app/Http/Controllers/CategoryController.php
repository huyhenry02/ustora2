<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Category::all();

return view('quan-tri.category.index',['data'=>$data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_category(Request $request)
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

        $data = new Category();
        $data->name = $request->name;

        $data->slug = str_slug($request->name);
        //kiểm tra File update lên
        $data->save();
        return redirect('quan-tri/category');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show_create_category()
    {
        return view('quan-tri.category.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Category::find($id);
        return view('quan-tri.category.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
////        $validated = $request->validate([
////            'name' => 'required|max:255|min:5|unique:brands',
////            'website' => 'required|max:255|min:5|unique:brands',
////            'image' => 'required|image|mimes: jpeg,png,jpg,gif,svg',
////        ], [
////            'name.required' => 'Tên không được để trống',
////            'name.min' => 'tên không được dưới 5 ký tự',
////            'image.mimes' => 'Không đúng định dạng',
////            'image.image' => 'Không đúng định dạng',
////    ]);
        $data = Category::find($id);
        $data->name = $request->name;
        $data->slug = str_slug($request->name);
        //kiểm tra File update lên
        $data->save();
        return redirect('quan-tri/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::destroy($id);
        return redirect('quan-tri/category');
    }
}
