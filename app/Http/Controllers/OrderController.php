<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use App\OrderStatus;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $data =Order::all();
        return view('quan-tri.order.index',['data'=>$data]);

    }
    public function more_info($id)
{
    $info =Order::find($id);
    $order_detail = $info->order_details;
//    dd($order_detail);
    return view('quan-tri.order.info',['info'=>$info,'order_detail'=>$order_detail]);

}
    public function create_order(Request $request)
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

        $data = new Order();
        $data->code = $request->code;
        $data->fullname = $request->fullname;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->phone = $request->phone;
        $data->coupon = $request->coupon;
        $data->total = $request->total;
        $data->created_at = $request->created_at;
        $data->save();
        return redirect( 'quan-tri/order');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show_create_order()
    {
        return view('quan-tri.order.create');
    }
    public function edit($id)
    {
        $data = Order::find($id);
        $order_status = OrderStatus::all();

        return view('quan-tri.order.edit', compact('data','order_status'));
    }
    public function update(Request $request,$id)
    {


        $data = Order::find($id);
        $data->order_status_id = $request->order_status_id;
        $data->save();
        return redirect( 'quan-tri/order');


    }

    public function destroy($id)
    {
        Order::destroy($id);
        return redirect('quan-tri/order');
    }
}
