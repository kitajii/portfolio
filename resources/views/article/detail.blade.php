@extends('layouts.layout')

@section('title','釣果詳細')

@section('main')
    <div class="main container">
        <div class="p-3 my-2 mx-3 bg-white shadow-sm rounded">
            <div class="item-top mx-auto mb-3">
                <p class="d-inline align-middle mx-1">{{ $article->created_at->format('Y年m月d日 H時i分') }}</p>
                @if($article->weather_id == 1)
                <i class="fas fa-sun fa-2x text-warning align-middle mx-1"></i>
                @elseif($article->weather_id == 2)
                <i class="fas fa-cloud fa-2x text-secondary align-middle mx-1"></i>
                @elseif($article->weather_id == 3)
                <i class="fas fa-umbrella fa-2x text-primary align-middle mx-1"></i>
                @else
                @endif
            </div>
            <div class="mt-4">
                <p class="m-0">投稿ユーザー</p>
            <div class="d-flex justify-content-center bg-light shadow-sm">
                <div class="mt-3 mr-4 pb-3">
                    <a href="{{ route('profile_detail', ['id'=>$article->user_id]) }}" class="text-decoration-none text-right" style="display: block; width: 64px; height: 64px; border-radius: 50%;">
                        <image src="{{ asset('storage/images/icon/'. $article->user->profile->icon_path) }}" class="rounded-circle border" style="width: 64px; height: 64px;"></image>
                    </a>
                </div>
                <div class="ml-4">
                    <p class="h5 mt-4 text-left">{{ $article->user->profile->name }}</p>
                    <p class="my-1 text-left">釣り歴：{{ $article->user->profile->experience }}年</p>
                </div>
            </div>
        </div>

            <div class="mt-4">
                <p class="m-0">サイズ：{{ $article->size }}cm</p>
                <image src="{{ asset('storage/images/image/'. $article->image_path) }}" class="mx-auto shadow" style="width: 100%;"></image>
            </div>
            <p class="mt-2 text-left">{{ $article->comment }}</p>
            <div class="my-3">
                <p class="my-0">ポイント</p>
                <div id="map" class="bg-secondary mx-auto text-light py-5" style="width: 100%; height: 100px;">地図</div>
            </div>
            @if(($user->id) == ($article->user_id))
            <div class="text-right">
                <a class="btn btn-outline-primary btn-sm px-4" href="{{ action('ArticleController@edit', ['id'=>$article->id]) }}">編集</a>
                &nbsp;
                <form class="d-inline" action="{{ action('ArticleController@delete', ['id'=>$article->id]) }}" method="post">
                @method('delete')
                @csrf
                <input type="submit" class="btn btn-outline-danger btn-sm px-4" value="削除">
                </form>
            </div>
            @endif
        </div>
    </div>
@endsection('main')