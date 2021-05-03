@extends('layouts.layout')

@section('title','釣果編集')

@section('main')
    <div class="main container">
        <form class="my-2 mx-3" action="{{ action('ArticleController@update') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="form-group p-3 my-2 bg-white shadow-sm rounded">
                <p class="h5 mb-2 font-weight-bold">天気</p>
                <div class="form-check form-check-inline mx-3">
                    <input class="form-check-input" id="sunny" type="radio" name="weather_id" value="1" @if($article->weather_id == 1)checked="checked"@endif>
                    <label class="form-check-label" for="sunny"><i class="fas fa-sun fa-lg text-warning"></i></label>
                </div>
                <div class="form-check form-check-inline mx-3">
                    <input class="form-check-input" id="cloudy" type="radio" name="weather_id" value="2" @if($article->weather_id == 2)checked="checked"@endif>
                    <label class="form-check-label" for="cloudy"><i class="fas fa-cloud fa-lg text-secondary"></i></label>
                </div>
                <div class="form-check form-check-inline mx-3">
                    <input class="form-check-input" id="rainy" type="radio" name="weather_id" value="3" @if($article->weather_id == 3)checked="checked"@endif>
                    <label class="form-check-label" for="rainy"><i class="fas fa-umbrella fa-lg text-primary"></i></label>
                </div>
            </div>
            <div class="form-group p-3 my-2 bg-white shadow-sm rounded">
                <p class="h5 mb-2 font-weight-bold">サイズ</p>
                <div class="form-inline justify-content-center">
                    <input type="number" step="1" min="1" max="80" name="size" class="form-control form-control-sm" style="width:50px" value="{{ $article->size }}" required>&nbsp;<span>㎝</span>
                </div>
            </div>
            <div class="form-group p-3 my-2 bg-white shadow-sm rounded">
                <p class="h5 mb-2 font-weight-bold">写真</p>
                <div class="mb-4">
                <image src="{{ asset('storage/images/image/'. $article->image_path) }}" class="mx-auto shadow" style="width: 128px;"></image>
                <p class="m-0">現在の投稿写真</p>
                </div>
                <label class="btn btn-outline-primary btn-sm">
                    <input id="file_select" type="file" name="image_path" style="display:none;">写真を選択
                </label>
                <p id="file_name" class="mb-0"></p>
            </div>
            <div class="form-group p-3 my-2 bg-white shadow-sm rounded">
                <p class="h5 mb-2 font-weight-bold">コメント</p>
                <textarea class="form-control" style="resize:none" name="comment" id="comment" rows="3">{{ $article->comment }}</textarea>
            </div>
            <input type="hidden" name="id" value="{{ $article->id }}">
            <button type="submit" class="btn btn-primary btn-block font-weight-bold my-3 mx-auto" style="width: 200px;">更新する</button>
        </form>
    </div>
@endsection('main')
@section('foot-script')
    <script src="{{ secure_asset('js/jquery.js') }}" defer></script>
@endsection('foot-script')