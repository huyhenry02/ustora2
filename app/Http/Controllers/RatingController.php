<?php

namespace App\Http\Controllers;

use App\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function index(Request $request)
    {
        $data =Rating::all();
        return view('quan-tri.rating.index',['data'=>$data]);

    }
    public function create_rating(Request $request)
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

        $data = new Rating();
        $data->name = $request->name;
        $data->title = $request->title;
        $data->email = $request->email;
        $data->phone = $request->phone;
        //kiểm tra File update lên
        if ($request->hasFile('image')) {
            //get file
            $file = $request->file('image');

            $filename = time() . '_' . $file->getClientOriginalName();

            //đường dẫn upload
            $path_upload = '/uploads/rating/';
            $request->file('image')->move($path_upload, $filename);
            $data->image = $path_upload . $filename;


            $data->save();
            return redirect( 'quan-tri/rating');
        }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show_create_rating()
    {
        return view('quan-tri.rating.create');
    }
    public function edit($id)
    {
        $data = Rating::find($id);
        return view('quan-tri.rating.edit', compact('data'));
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

        $data = Rating::find($id);
        $data->name = $request->name;
        $data->title = $request->title;
        $data->email = $request->email;
        $data->phone = $request->phone;
        //kiểm tra File update lên
        if ($request->hasFile('image')) {
            //get file
            $file = $request->file('image');

            $filename = time() . '_' . $file->getClientOriginalName();

            //đường dẫn upload
            $path_upload = '/uploads/rating/';
            $request->file('image')->move($path_upload, $filename);
            $data->image = $path_upload . $filename;


            $data->save();
            return redirect( 'quan-tri/rating');
        }


    }

    public function destroy($id)
    {
        Rating::destroy($id);
        return redirect('quan-tri/rating');
    }
}
