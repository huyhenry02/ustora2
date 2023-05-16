<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderProduct;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //Hàm hiển thị giỏ hàng
    public function show_cart()
    {
//        dd(auth()->guard('customer')->user());
        $cart = session()->get('cart');
//        dd($cart);
        $totalPrice = $this->getTotalPrice();
        return view('shopping cart.index',compact('cart', 'totalPrice'));
    }
    //Hàm thêm saản phâẩm vaò giỏ hàng
    public function addProduct(Request  $request)
    {
        $productId = intval($request->input('id'));
        $product = Product::find($productId);

        if (!$product) {
            return redirect()->back()->withErrors(['product_not_found' => 'Sản phẩm không tồn tại']);
        }

        $cart = Session::get('cart', []);
        $cart[$productId] = [
            'id' => $productId, // Thêm phần tử 'id' vào giỏ hàng
            'name' => $product->name,
            'price' => $product->price,
            'image' => $product->image,
            'quantity' => 1,
        ];
        Session::put('cart', $cart);
        return redirect()->back()->with('success', 'Đã thêm sản phẩm vào giỏ hàng');
    }
    //Hàm update số lượng của sản phẩm trong giỏ hàng
    public function updateCart(Request $request)
    {
        $productId = $request->input('productId');
        $cart = Session::get('cart', []);
        $currentProduct = $cart[$productId] ?? null;
        if ($currentProduct !== null) {
            $currentProduct['quantity'] = (int) $request->input('quantity');
            $cart[$productId] = $currentProduct;
        }
        Session::put('cart', $cart);
        return redirect()->back()->with('success', 'Đã cập nhật giỏ hàng');
    }
    // Haàm lưu giỏ hàng vào khách hàng
//    public function saveCart(Request $request)
//    {
//        $cart =session()->get('cart');
//        $customer = Auth::guard('customer')->user();
//        $customer->cart = serialize($cart);
//        $customer->save();
//        return redirect()->back();
//
//    }
    public function delete(Request $request)
    {
        $productId = $request ->input('productId');
        $cart = session()->get('cart',[]);
        if(isset($cart[$productId])){
            unset($cart[$productId]);
            Session::put('cart',$cart);
            return redirect()->back()->with('success','Sản phẩm đã đuợc xóa  thành công');
        }
        return redirect()->back()->withErrors(['product_not_found'=>'Sản phẩm không được tìm thấy']);
    }
    //hàm tiính tổng tiền sản phẩm trong giỏ hàng
    public function getTotalPrice()
    {
        $cart = session()->get('cart', []);
        $totalPrice = 0;

        if (!empty($cart)) {
            foreach ($cart as $item) {
                $totalPrice += $item['price'] * $item['quantity'];
            }
        }

        return $totalPrice;
    }
    function getOrderCode(){
        $orderCode = 'U'.date('Ymd').'KH'.Auth::guard('customer')->user()->id.mt_rand(10, 99);
        return $orderCode;
    }
    // Tạo đơn hang từ giỏ hàng
    public function order_by_cart(Request $request)
    {
//        // Lấy thông tin đăng nhập của người dùng hiện tại
//        $credentials = [
//            'username' => Auth::guard('customer')->user()->username,
//            'password' => $request->input('password')
//        ];
//        // Lưu thông tin đơn hàng
//        if (!Auth::attempt($credentials)) {
//            return redirect()->back()->withErrors(['password' => 'Mật khẩu không đúng']);
//        }

        $order = new Order();
        $order->customer_id = Auth::guard('customer')->user()->id;
        $order->code =  $this->getOrderCode();
        $order->fullname = $request->fullname;
        $order->email = $request->email;
        $order->address = $request->address;
        $order->address2 = $request->address2;
        $order->phone = $request->phone;
        $order->total =  $this->getTotalPrice();
        $order->order_status_id =  '1';
        $order->save();

        // Lưu thông tin các sản phẩm trong đơn hàng
        $cart = session()->get('cart');
        foreach ($cart as $product) {
            $orderProduct = new OrderProduct();
            $orderProduct->order_id = $order->id;
            $orderProduct->product_id = $product['id'];
            $orderProduct->product_name = $product['name'];
            $orderProduct->name = $product['name'];
            $orderProduct->image = $product['image'];
            $orderProduct->quantity = $product['quantity'];
            $orderProduct->price = $product['price'];
            $orderProduct->save();
        }

        // Xóa giỏ hàng khỏi session
        session()->forget('cart');

        return redirect()->route('cart.index')->with('success', 'Đơn hàng của bạn đã được đặt thành công!');
    }

}
