<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Profile;
use App\Article;
use Carbon\Carbon;
use Storage;

class ArticleController extends Controller
{
    
    
    public function map(Request $request)
    {
        $articles = Article::all();

        $val = '[';
        foreach($articles as $article) {
            $val .= sprintf("{url: '%s', icon: '%s', name: '%s', created_at: '%s', lat: %.5f, lng: %.5f},",
                route('article_detail', ['id'=>$article->id]),
                asset('storage/images/icon/'. $article->user->profile->icon_path),
                $article->user->name,
                $article->created_at->format('Y年m月d日 H時i分'),
                $article->latitude,
                $article->longitude
            );
        }
        $val .= ']';
        
        // dd($val);

        return view('map', ['article_data' => $val]);
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
            $path = Storage::disk('s3')->putFile('/images/image',$new_article['image_path'],'public');
            $article->image_path = Storage::disk('s3')->url($path);
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
        //絞り込み検索フォームからのリクエストが１つでもある場合
        if( !$this->isNullOrEmpty($request->from_date) || !$this->isNullOrEmpty($request->until_date) || !$this->isNullOrEmpty($request->from_time) || !$this->isNullOrEmpty($request->until_time) || !$this->isNullOrEmpty($request->weather_id) || !$this->isNullOrEmpty($request->from_size) || !$this->isNullOrEmpty($request->to_size) ){
            if(!$this->isNullOrEmpty($request->from_date) && !$this->isNullOrEmpty($request->until_date)){ //期間が指定されていたら
                //$articlesから期間でデータ検索して$articlesに結果代入
                $from_date = new Carbon($request->from_date . ' 00:00:00');
                $until_date = new Carbon($request->until_date . ' 23:59:59');
                $articles = Article::whereBetween('created_at', [$from_date, $until_date])->get()->sortByDesc('created_at');
            }
            if(!$this->isNullOrEmpty($request->from_time) || !$this->isNullOrEmpty($request->until_time)){ //時間が指定されていたら
                //時間でデータ検索して$articlesに結果代入
                $from_time = $request->from_time;
                $until_time = $request->until_time;
                $query = sprintf("time_format(created_at, '%%H:%%k:%%s') between '%s:00' and '%s:59'", $from_time, $until_time);
                $articles = Article::whereRaw($query)->get()->sortByDesc('created_at'); 
            }
            if(!$this->isNullOrEmpty($request->weather_id)){
                //天気でデータ検索して$articlesに結果代入
                $weather_id = $request->weather_id;
                $articles = Article::where('weather_id',$weather_id)->get()->sortByDesc('created_at');
            }
            if(!$this->isNullOrEmpty($request->size) || !$this->isNullOrEmpty($request->to_size)){
                $from_size = $request->from_size;
                $to_size = $request->to_size;
                $articles = Article::whereBetween('size', [$from_size, $to_size])->get();
                //sizeでデータ検索して$articlesに結果代入
            }
        }else{
            $articles = Article::all()->sortByDesc('created_at'); //全記事をリスト表示
        }
        return view('article.list', ['articles' => $articles]);
    }
    
    public function detail(Request $request)
    {
        $user = Auth::user();
        $article = Article::find($request->id);
        if(empty($article)){
            abort(404);
        }
        return view('article.detail', ['article' => $article,'user' => $user]);
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
            $path = Storage::disk('s3')->putFile('/images/image',$form['image_path'],'public');
            $article->image_path = Storage::disk('s3')->url($path);
        } else {
            $article->image_path = $article->image_path;
        }

        unset($new_article['image_path']);
        unset($new_article['_token']);

        $article->fill($new_article)->save();
        
        return redirect(route('article_detail', ['id' => $article->id]));
    }
    
    public function delete(Request $request)
    {
        $article = Article::find($request->id);
        $article->delete();
        return redirect('article/list');
    }
    
    public function point(Request $request)
    {
        $article = Article::find($request->id);
        if(empty($article)){
            abort(404);
        }
        return view('article.point', ['article' => $article]);
    }
    
    private function isNullOrEmpty($val) {
    return $val == null || $val == '';
    } 
}