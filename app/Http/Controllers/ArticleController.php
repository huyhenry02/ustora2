<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $data =Article::all();
        return view('quan-tri.article.index',['data'=>$data]);

    }
    public function create_article(Request $request)
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

        $data = new Article();
        $data->name = $request->name;
        $data->title = $request->title;
        $data->save();
        return redirect( 'quan-tri/article');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show_create_article()
    {
        return view('quan-tri.article.create');
    }

    public function edit($id)
    {
        $data = Article::find($id);
        return view('quan-tri.article.edit', compact('data'));
    }
    public function update(Request $request, $id)
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

        $data = Article::find($id);
        $data->name = $request->name;
        $data->title = $request->title;
        $data->save();
        return redirect( 'quan-tri/article');


    }
    public function destroy($id)
    {
        Vendor::destroy($id);
        return redirect('quan-tri/article');
    }
}
