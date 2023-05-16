<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
class LoginCustomerController extends Controller
{
    public function formLogin(){
      return view('checkout.login');
    }
    public function postLogin(Request $request)
    {
//        session()->get('cart');
        if(Auth::guard('customer')->attempt(['username'=> $request->username,'password'=> $request->password])){
            session()->flash('success_login', 'Bạn đã đăng nhập thành công.');
            return redirect()->route('ustora.index');
        }else{
            session()->flash('error_login', 'Tên đăng nhập hoặc mật khẩu không đúng.');
            return redirect()->route('ustora.customer_login');
        }
    }
    public function logout(){
        session()->forget('cart');
        if(Auth::guard('customer')->check()){
            Auth::guard('customer')->logout();
            session()->flash('success_logout', 'Bạn đã đăng xuất thành công.');
            return redirect()->route('ustora.customer_login');
        }else{
            session()->flash('error_logout', ' Đăng xuất không thành công.');
            return redirect()->route('ustora.index');
        }
    }
}
