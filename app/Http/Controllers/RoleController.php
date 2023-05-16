<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        $data =Role::all();
        return view('quan-tri.role.index',['data'=>$data]);

    }
    public function create_role(Request $request)
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

        $data = new Role();
        $data->name = $request->name;
        $data->save();
        return redirect( 'quan-tri/role');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show_create_role()
    {
        return view('quan-tri.role.create');
    }
    public function edit($id)
    {
        $data = Role::find($id);
        return view('quan-tri.role.edit', compact('data'));
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

        $data = Role::find($id);
        $data->name = $request->name;
        $data->save();
        return redirect( 'quan-tri/role');


    }
    public function destroy($id)
    {
        Role::destroy($id);
        return redirect('quan-tri/role');
    }
}
