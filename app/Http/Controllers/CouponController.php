<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index(Request $request)
    {
        $data =Coupon::all();
        return view('quan-tri.coupon.index',['data'=>$data]);

    }
    public function create_coupon(Request $request)
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

        $data = new Coupon();
        $data->code = $request->code;
        $data->value = $request->value;
        $data->percent = $request->percent;
        $data->created_at = $request->created_at;
        $data->save();
        return redirect( 'quan-tri/coupon');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show_create_coupon()
    {
        return view('quan-tri.coupon.create');
    }
    public function edit($id)
    {
        $data = Coupon::find($id);
        return view('quan-tri.coupon.edit', compact('data'));
    }
    public function update(Request $request)
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

        $data = new Coupon();
        $data->code = $request->code;
        $data->value = $request->value;
        $data->percent = $request->percent;
        $data->created_at = $request->created_at;
        $data->save();
        return redirect( 'quan-tri/coupon');


    }

    public function destroy($id)
    {
        Coupon::destroy($id);
        return redirect('quan-tri/coupon');
    }
}
