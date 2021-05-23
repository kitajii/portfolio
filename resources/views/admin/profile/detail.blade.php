@extends('layouts.admin.layout')

@section('title')
{{$profile->name}}のページ（管理者）
@endsection('title')

@section('main')
    <div class="main container">
        <div class="p-3 my-2 mx-3 bg-white shadow-sm rounded">
            <div class="my-4">
                <image src="{{ $profile->icon_path }}" class="rounded-circle border" style="width: 128px; height: 128px;"></image>
                <p class="h5 my-3">{{ $profile->name }}</p>
            </div>
            <div class="px-4 text-left">
                <div class="d-flex justify-content-around">
                    @if($profile->age != 0)
                    <p class="d-inline">年齢：{{ $profile->age }}歳</p>
                    @else
                    <p class="d-inline">年齢：未登録</p>
                    @endif
                    @if(isset($profile->experience))
                    <p class="d-inline">釣り歴：{{ $profile->experience }}年</p>
                    @else
                    <p class="d-inline">釣り歴が登録されていません</p>
                    @endif
                </div>
                <p>{{ $profile->introduction }}</p>
            </div>
        </div>
        @if(count($articles) > 0)
        @foreach($articles as $article)
        <ul class="list-unstyled mb-0">
            <a class="text-secondary text-decoration-none" href="{{ route('admin_article_detail', ['id'=>$article->id]) }}">
                <li class="border-bottom py-3">
                    <div class="item-top mx-auto">
                        <p class="d-inline align-middle mx-2">{{ $article->created_at->format('Y年m月d日 H時i分') }}</p>
                        @if($article->weather_id == 1)
                        <i class="fas fa-sun fa-2x text-warning align-middle mx-2"></i>
                        @elseif($article->weather_id == 2)
                        <i class="fas fa-cloud fa-2x text-secondary align-middle mx-2"></i>
                        @elseif($article->weather_id == 3)
                        <i class="fas fa-umbrella fa-2x text-primary align-middle mx-2"></i>
                        @else
                        @endif
                    </div>
                    <div class="item-bottom d-flex justify-content-around">
                        <div class="col-4 px-0">
                            <object>
                                <a href="{{ route('admin_profile_detail', ['id'=>$article->user_id]) }}" class="mx-auto mt-2 text-decoration-none" style="display: block; width: 64px; height: 64px; border-radius: 50%;">
                                    <image src="{{ $article->user->profile->icon_path }}" class="rounded-circle border" style="width: 64px; height: 64px;"></image>
                                </a>
                            </object>
                        </div>
                        <div class="col-4 px-0 text-left">
                            <p class="h6 pt-3 m-0" style="line-height: 48px;">{{ $article->user->profile->name }}</p>
                        </div>
                        <div class="col-4 p-0">
                            <p class="h3 pt-3 pr-5 m-0" style="line-height: 48px;">{{ $article->size }}cm</p>
                        </div>
                    </div>
                </li>
            </a>
        </ul>
        @endforeach
        @else
        <p>釣果記録がありません</p>
        @endif
    </div>
@endsection('main')