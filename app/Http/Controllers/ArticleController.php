<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Profile;
use App\Article;

class ArticleController extends Controller
{
    public function map(Request $request)
    {
        return view('map');
    }
    
    public function add(Request $request)
    {
        $user = Auth::user();
        $latlng = $request->all();
        return view('article.create',['latlng' => $latlng, 'user'=>$user]);
    }
    
    public function create(Request $request)
    {
        $this->validate($request, Article::$rules);
        $article = new Article;
        $new_article = $request->all();
        
        if (isset($new_article['image_path'])) {
            $path = $request->file('image_path')->store('public/images/image');
            $article->image_path = basename($path);
        } else {
            $article->image_path = null;
        }

        unset($new_article['image_path']);
        unset($new_article['_token']);
        
        $article->fill($new_article)->save();
        
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