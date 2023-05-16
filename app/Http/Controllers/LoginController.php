<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class LoginController extends Controller
{
    public function formLogin()
    {
    return view('quan-tri.login.index');
    }

    public function postlogin(Request $request)
    {

        if (Auth::guard('web')->attempt(['email'=> $request->email,'password'=>$request->password])){
            return redirect()->route('quan-tri.admin');
        }else{
            return redirect()->route('quan-tri.admin');
        }

    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('quan-tri.dang-nhap');
    }


}
