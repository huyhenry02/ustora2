<?php

namespace App\Http\Controllers;


use App\Role;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =User::all();
        return view('quan-tri.user.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show_create_user(Request $request)
    {
        $roles =Role::all();
        return view('quan-tri.user.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create_user(Request $request)
    {
        $data = new User();
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->username = $request->username;
        $data->password = bcrypt($request->password);
        //kiểm tra File update lên
        if ($request->hasFile('avatar')) {
            //get file
            $file = $request->file('avatar');

            $filename = time() . '_' . $file->getClientOriginalName();

            //đường dẫn upload
            $path_upload = 'uploads/user/';
            $request->file('avatar')->move($path_upload, $filename);
            $data->avatar = $path_upload . $filename;
        }
        $data->role_id = $request->role_id;
        $data->save();
        return redirect('quan-tri/user');
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
        {
            $data = User::find($id);
            return view('quan-tri.user.edit', compact('data'));

        }
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
        $data = User::find($id);
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->username = $request->username;
        $data->password = bcrypt($request->password);
        //kiểm tra File update lên
        if ($request->hasFile('avatar')) {
            //get file
            $file = $request->file('avatar');

            $filename = time() . '_' . $file->getClientOriginalName();

            //đường dẫn upload
            $path_upload = 'uploads/user/';
            $request->file('avatar')->move($path_upload, $filename);
            $data->avatar = $path_upload . $filename;


            $data->save();
            return redirect('quan-tri/user');
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
        User::destroy($id);
        return redirect('quan-tri/user');
    }
}
