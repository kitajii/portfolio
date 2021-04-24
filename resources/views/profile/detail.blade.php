@extends('layouts.layout')

@section('title')
{{$profile->name}}のページ
@endsection('title')

@section('main')
    <div class="main container">
        <div class="p-3 my-2 mx-3 bg-white shadow-sm rounded">
            <div class="my-4">
                <a href="#" class="mx-auto" style="display: block; width: 64px; height: 64px; border-radius: 50%;">
                    <div class="bg-secondary text-light py-3 rounded-circle" style="width: 64px; height: 64px;">アイコン
                    </div>
                </a>
                <p class="h5 my-3">{{ $profile->name }}</p>
            </div>
            <div class="px-4 text-left">
                <div class="d-flex justify-content-around">
                    @if(isset($profile->age))
                    <p class="d-inline">年齢：{{ $profile->age }}</p>
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
            @if(($user->id) == ($profile->user_id))
            <div class="text-right">
                <a href="{{ action('ProfileController@edit', ['id'=> $profile->id]) }}">編集</a>
            </div>
            @endif
        </div>
        <ul class="list-unstyled mb-0">
            <a class="text-secondary text-decoration-none" href="https://www.google.co.jp/">
                <li class="border-bottom py-3">
                    <div class="item-top mx-auto">
                        <p class="h5 d-inline align-middle mx-2">2021年7月7日</p>
                        <p class="h5 d-inline align-middle mx-2">07:10</p>
                        <i class="fas fa-sun fa-2x text-warning align-middle mx-2"></i>
                    </div>
                    <div class="item-bottom d-flex justify-content-around">
                        <div class="col-4 px-0">
                            <object>
                                <a class="mx-auto mt-3 text-decoration-none" href="{{ action('ProfileController@detail',['id'=> $profile->id]) }}"
                                    style="display: block; width: 64px; height: 64px; border-radius: 50%;">
                                    <div class="bg-secondary text-light py-3 rounded-circle"
                                        style="width: 64px; height: 64px;">アイコン</div>
                                    
                                </a>
                            </object>
                        </div>
                        <div class="col-4 px-0 text-left">
                            <p class="h6 pt-3 m-0" style="line-height: 48px;">{{ $profile->name }}</p>
                        </div>
                        <div class="col-4 p-0">
                            <p class="h3 pt-3 pr-5 m-0" style="line-height: 48px;">30cm</p>
                        </div>
                    </div>
                </li>
            </a>
            <a class="text-secondary text-decoration-none" href="https://www.google.co.jp/">
                <li class="border-bottom py-3">
                    <div class="item-top mx-auto">
                        <p class="h5 d-inline align-middle mx-2">2021年7月7日</p>
                        <p class="h5 d-inline align-middle mx-2">07:10</p>
                        <i class="fas fa-sun fa-2x text-warning align-middle mx-2"></i>
                    </div>
                    <div class="item-bottom d-flex justify-content-around">
                        <div class="col-4 px-0">
                            <object>
                                <a href="https://www.youtube.com/" class="mx-auto mt-3 text-decoration-none"
                                    style="display: block; width: 64px; height: 64px; border-radius: 50%;">
                                    <div class="bg-secondary text-light py-3 rounded-circle"
                                        style="width: 64px; height: 64px;">アイコン</div>
                                </a>
                            </object>
                        </div>
                        <div class="col-4 px-0 text-left">
                            <p class="h6 pt-3 m-0" style="line-height: 48px;">ユーザー名</p>
                        </div>
                        <div class="col-4 p-0">
                            <p class="h3 pt-3 pr-5 m-0" style="line-height: 48px;">30cm</p>
                        </div>
                    </div>
                </li>
            </a>
            <a class="text-secondary text-decoration-none" href="https://www.google.co.jp/">
                <li class="border-bottom py-3">
                    <div class="item-top mx-auto">
                        <p class="h5 d-inline align-middle mx-2">2021年7月7日</p>
                        <p class="h5 d-inline align-middle mx-2">07:10</p>
                        <i class="fas fa-sun fa-2x text-warning align-middle mx-2"></i>
                    </div>
                    <div class="item-bottom d-flex justify-content-around">
                        <div class="col-4 px-0">
                            <object>
                                <a href="https://www.youtube.com/" class="mx-auto mt-3 text-decoration-none"
                                    style="display: block; width: 64px; height: 64px; border-radius: 50%;">
                                    <div class="bg-secondary text-light py-3 rounded-circle"
                                        style="width: 64px; height: 64px;">アイコン</div>
                                </a>
                            </object>
                        </div>
                        <div class="col-4 px-0 text-left">
                            <p class="h6 pt-3 m-0" style="line-height: 48px;">ユーザー名</p>
                        </div>
                        <div class="col-4 p-0">
                            <p class="h3 pt-3 pr-5 m-0" style="line-height: 48px;">30cm</p>
                        </div>
                    </div>
                </li>
            </a>
            <a class="text-secondary text-decoration-none" href="https://www.google.co.jp/">
                <li class="border-bottom py-3">
                    <div class="item-top mx-auto">
                        <p class="h5 d-inline align-middle mx-2">2021年7月7日</p>
                        <p class="h5 d-inline align-middle mx-2">07:10</p>
                        <i class="fas fa-sun fa-2x text-warning align-middle mx-2"></i>
                    </div>
                    <div class="item-bottom d-flex justify-content-around">
                        <div class="col-4 px-0">
                            <object>
                                <a href="https://www.youtube.com/" class="mx-auto mt-3 text-decoration-none"
                                    style="display: block; width: 64px; height: 64px; border-radius: 50%;">
                                    <div class="bg-secondary text-light py-3 rounded-circle"
                                        style="width: 64px; height: 64px;">アイコン</div>
                                </a>
                            </object>
                        </div>
                        <div class="col-4 px-0 text-left">
                            <p class="h6 pt-3 m-0" style="line-height: 48px;">ユーザー名</p>
                        </div>
                        <div class="col-4 p-0">
                            <p class="h3 pt-3 pr-5 m-0" style="line-height: 48px;">30cm</p>
                        </div>
                    </div>
                </li>
            </a>
            
        </ul>

    </div>
@endsection('main')