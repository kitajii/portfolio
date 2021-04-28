<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function map(Request $request)
    {
        return view('map');
    }
    
    public function add(Request $request)
    {
        $latlng = $request->all();
        return view('article.create',['latlng' => $latlng]);
    }
    
    public function create(Request $request)
    {
        return redirect('article/list');
    }

    public function list()
    {
        return view('article.list');
    }
    
    public function seach()
    {
        return view('article.list');
    }
    
    public function detail()
    {
        return view('article.detail');
    }
    
    public function edit()
    {
        return view('article.edit');
    }
    public function update()
    {
        return redirect('article/detail');
    }
    
    public function delete()
    {
        return view('article.list');
    }
    
    public function point()
    {
        return view('article.point');
    }
}