<?php

namespace App\Http\Controllers;

use App\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $data =Banner::all();
        return view('quan-tri.banner.index',['data'=>$data]);
    }
    public function create_banner(Request $request)
    {
        $data = new Banner();
        $data->title = $request->title;
        $data->slug = str_slug($request->title);
        //kiểm tra File update lên
        if ($request->hasFile('image')) {
            //get file
            $file = $request->file('image');

            $filename = time() . '_' . $file->getClientOriginalName();

            //đường dẫn upload
            $path_upload = 'uploads/banner/';
            $request->file('image')->move($path_upload, $filename);
            $data->image = $path_upload . $filename;


            $data->save();
            return redirect('quan-tri/banner');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show_create_banner()
    {

        return view('quan-tri.banner.create');
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
        $data = Banner::find($id);
        return view('quan-tri.banner.edit', compact('data'));
    }


    public function update(Request $request, $id)
    {

        $data = Banner::find($id);
        $data->title = $request->title;

        $data->slug = str_slug($request->title);
        //kiểm tra File update lên
        if ($request->hasFile('image')) {
            //get file
            $file = $request->file('image');

            $filename = time() . '_' . $file->getClientOriginalName();

            //đường dẫn upload
            $path_upload = 'uploads/banner/';
            $request->file('image')->move($path_upload, $filename);
            $data->image = $path_upload . $filename;


            $data->save();
            return redirect('quan-tri/banner');
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
        Banner::destroy($id);
        return redirect('quan-tri/banner');
    }
}
