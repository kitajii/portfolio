<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Profile;
use App\Article;
use App\Http\Controllers\Controller;
use Storage;


class ArticleController extends Controller
{
    
    
    public function map(Request $request)
    {
        
        $articles = Article::all();
        $val = '[';
        foreach($articles as $article) {
            $val .= sprintf("{url: '%s', icon: '%s', name: '%s', created_at: '%s', lat: %.5f, lng: %.5f},",
                route('admin_article_detail', ['id' =>$article->id]),
                $article->user->profile->icon_path,
                $article->user->name,
                $article->created_at->format('Y年m月d日 H時i分'),
                $article->latitude,
                $article->longitude
            );
        }
        $val .= ']';

        return view('admin.map', ['article_data' => $val]);
    }

    public function list(Request $request)
    {
        //絞り込み検索フォームからのリクエストが１つでもある場合
        if( !empty($request->from_date) || !empty($request->until_date) || !empty($request->from_time) || !empty($request->until_time) || !empty($request->weather_id) || !empty($request->from_size) || !empty($request->to_size) ){
            
            $from_date = $request->from_date;
            $until_date = $request->until_date;
            $from_time = $request->from_time;
            $until_time = $request->until_time;
            $weather_id = $request->weather_id;
            $from_size = $request->from_size;
            $to_size = $request->to_size;
            $query = Article::query();
            
            if(!$this->isNullOrEmpty($request->from_date) || !$this->isNullOrEmpty($request->until_date)){
                $query->whereDate('created_at','>=',$from_date)->whereDate('created_at','<=',$until_date);
            }
            if(!$this->isNullOrEmpty($request->from_time) || !$this->isNullOrEmpty($request->until_time)){
                $query->whereTime('created_at','>=',$from_time.':00')->whereTime('created_at','<=',$until_time.':59');
            }
            if(!$this->isNullOrEmpty($request->weather_id)){
                $query->where('weather_id',$weather_id);
            }
            if(!$this->isNullOrEmpty($request->size) || !$this->isNullOrEmpty($request->to_size)){
            $query->whereBetween('size', [$from_size, $to_size]);
            }
            
            $articles = $query->get()->sortByDesc('created_at');
            
        }else{
            $articles = Article::all()->sortByDesc('created_at'); //全記事をリスト表示
        }
        return view('article.list', ['articles' => $articles]);
    }
    
    public function detail(Request $request)
    {
        $article = Article::find($request->id);
        if(empty($article)){
            abort(404);
        }
        return view('admin.article.detail', ['article' => $article]);
    }
    
    public function edit(Request $request)
    {
        $article = Article::find($request->id);
        return view('admin.article.edit', ['article' => $article]);
    }
    
    public function update(Request $request)
    {
        $this->validate($request, Article::$rules);
        $article = Article::find($request->id);
        $new_article = $request->all();
        
        if (isset($new_article['image_path'])) {
            $path = Storage::disk('s3')->putFile('/images/image',$new_article['image_path'],'public');
            $article->image_path = Storage::disk('s3')->url($path);
        } else {
            $article->image_path = $article->image_path;
        }

        unset($new_article['image_path']);
        unset($new_article['_token']);

        $article->fill($new_article)->save();
        
        return redirect(route('admin_article_detail', ['id' => $article->id]));
    }
    
    public function delete(Request $request)
    {
        $article = Article::find($request->id);
        $article->delete();
        return redirect('admin/article/list');
    }
    
    public function point(Request $request)
    {
        $article = Article::find($request->id);
        if(empty($article)){
            abort(404);
        }
        return view('admin.article.point', ['article' => $article]);
    }
}