<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =Brand::all();

        return view('quan-tri.brand.index',['data'=>$data]);


    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_brand(Request $request)
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

        $data = new Brand();
        $data->name = $request->name;
        $data->website = $request->website;
        $data->slug = str_slug($request->name);
        //kiểm tra File update lên
        if ($request->hasFile('image')) {
            //get file
            $file = $request->file('image');

            $filename = time() . '_' . $file->getClientOriginalName();

            //đường dẫn upload
            $path_upload = 'uploads/brand/';
            $request->file('image')->move($path_upload, $filename);
            $data->image = $path_upload . $filename;


            $data->save();
            return redirect('quan-tri/brand');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show_create_brand()
    {

        return view('quan-tri.brand.create');
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
        $data = Brand::find($id);
        return view('quan-tri.brand.edit', compact('data'));
    }


    public function update(Request $request, $id)
    {

        $data = Brand::find($id);
        $data->name = $request->name;
        $data->website = $request->website;
        $data->slug = str_slug($request->name);
        //kiểm tra File update lên
        if ($request->hasFile('image')) {
            //get file
            $file = $request->file('image');

            $filename = time() . '_' . $file->getClientOriginalName();

            //đường dẫn upload
            $path_upload = 'uploads/brand/';
            $request->file('image')->move($path_upload, $filename);
            $data->image = $path_upload . $filename;


            $data->save();
            return redirect('quan-tri/brand');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Brand::destroy($id);
        return redirect('quan-tri/brand');
    }
}
