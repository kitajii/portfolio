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

    public function list(Request $request)
    {
        $articles = Article::all()->sortByDesc('created_at');
        
        return view('article.list', ['articles' => $articles]);
    }
    
    public function seach()
    {
        return view('article.list');
    }
    
    public function detail(Request $request)
    {
        $user = Auth::user();
        $article = Article::find($request->id);
        if(empty($article)){
            abort(404);
        }
        return view('article.detail', ['article' => $article,'user'=>$user]);
    }
    
    public function edit(Request $request)
    {
        $article = Article::find($request->id);
        return view('article.edit', ['article' => $article]);
    }
    public function update(Request $request)
    {
        $user = Auth::user();
        $this->validate($request, Article::$rules);
        $article = Article::find($request->id);
        $new_article = $request->all();
        
        if (isset($new_article['image_path'])) {
            $path = $request->file('image_path')->store('public/images/image');
            $article->image_path = basename($path);
        } else {
            $article->image_path = $article->image_path;
        }

        unset($new_article['image_path']);
        unset($new_article['_token']);

        $article->fill($new_article)->save();
        
        return redirect(route('article_detail', ['id'=>$article->user_id]));
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