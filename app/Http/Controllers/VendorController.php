<?php

namespace App\Http\Controllers;

use App\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function index(Request $request)
    {
        $data =Vendor::all();
        return view('quan-tri.vendor.index',['data'=>$data]);

    }
    public function create_vendor(Request $request)
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

        $data = new Vendor();
        $data->name = $request->name;
        $data->name_manager = $request->name_manager;
        $data->website = $request->website;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->phone = $request->phone;

        $data->slug = str_slug($request->name);
        //kiểm tra File update lên
        if ($request->hasFile('image')) {
            //get file
            $file = $request->file('image');

            $filename = time() . '_' . $file->getClientOriginalName();

            //đường dẫn upload
            $path_upload = 'uploads/vendor/';
            $request->file('image')->move($path_upload, $filename);
            $data->image = $path_upload . $filename;


            $data->save();
            return redirect('quan-tri/vendor');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show_create_vendor()
    {
        return view('quan-tri.vendor.create');
    }
    public function edit($id)
    {
        $data = Vendor::find($id);
        return view('quan-tri.vendor.edit', compact('data'));
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

        $data = Vendor::find($id);
        $data->name = $request->name;
        $data->name_manager = $request->name_manager;
        $data->website = $request->website;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->phone = $request->phone;

        $data->slug = str_slug($request->name);
        //kiểm tra File update lên
        if ($request->hasFile('image')) {
            //get file
            $file = $request->file('image');

            $filename = time() . '_' . $file->getClientOriginalName();

            //đường dẫn upload
            $path_upload = 'uploads/vendor/';
            $request->file('image')->move($path_upload, $filename);
            $data->image = $path_upload . $filename;


            $data->save();
            return redirect('quan-tri/vendor');
        }

    }


    public function destroy($id)
    {
        Vendor::destroy($id);
        return redirect('quan-tri/vendor');
    }
}
