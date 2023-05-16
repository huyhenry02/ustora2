<?php

namespace App\Http\Controllers;
use App\Category;
use App\Customer;
use Illuminate\Http\Request;

class RegisterCustomerController extends Controller
{
    public function index()
    {
        $data = Customer::all();
        return view('quan-tri.register.index',['data' => $data]);
    }
    public function formRegister(){
        return view('checkout.register');
    }
    public function postRegister(Request $request){
        $data = new Customer();
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->username = $request->username;
        $data->address = $request->address;
        $data->password = bcrypt($request->password);
        //kiểm tra File update lên
        if ($request->hasFile('avatar')) {
            //get file
            $file = $request->file('avatar');
            $filename = time() . '_' . $file->getClientOriginalName();
            //đường dẫn upload
            $path_upload = 'uploads/customer/';
            $request->file('avatar')->move($path_upload, $filename);
            $data->avatar = $path_upload . $filename;
        }
        $data->save();
        return redirect('ustora/login');
    }
}
