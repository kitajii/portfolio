@extends('layouts.layout')

@section('title','プロフィール編集')

@section('main')
    <div class="main container">
        <form class="my-2 mx-3" action={{ action('ProfileController@update') }} class="py-1" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group p-3 my-2 bg-white shadow-sm rounded">
                <p class="h5 mb-2 font-weight-bold">ユーザー名</p>
                <input class="form-control form-control-sm d-inline" type="text" name="name" style="width:200px" value="{{ $profile->name }}" required>
            </div>
            <div class="form-group p-3 my-2 bg-white shadow-sm rounded">
                <p class="h5 mb-2 font-weight-bold">アイコン</p>
                <label class="btn btn-outline-primary btn-sm">
                    <input id="file_select" type="file" name="icon_path" style="display:none;">画像を選択
                </label>
                <p id="file_name" class="mb-0">選択されていません</p>
            </div>
            <div class="form-group p-3 my-2 bg-white shadow-sm rounded">
                <p class="h5 mb-2 font-weight-bold">年齢</p>
                <div class="form-inline justify-content-center">
                    <input class="form-control form-control-sm" type="number" step="1" min="0" max="120" name="age" style="width:50px" value="{{ $profile->age }}" required>&nbsp;<span>歳</span>
                </div>
            </div>
            <div class="form-group p-3 my-2 bg-white shadow-sm rounded">
                <p class="h5 mb-2 font-weight-bold">釣り歴</p>
                <div class="form-inline justify-content-center">
                    <input class="form-control form-control-sm" type="number" step="1" min="0" max="120" name="experience" style="width:50px" value="{{ $profile->experience }}" required>&nbsp;<span>年</span>
                </div>
            </div>
            <div class="form-group p-3 my-2 bg-white shadow-sm rounded">
                <p class="h5 mb-2 font-weight-bold">自己紹介</p>
                <textarea class="form-control" style="resize:none" name="introduction" rows="3">{{ $profile->introduction }}</textarea>
            </div>
            <input type="hidden" name="id" value="{{ $profile->id }}">
            <input class="btn btn-primary btn-block font-weight-bold mt-3 mx-auto" type="submit" style="width: 200px;" value="更新">
        </form>
    </div>
@endsection('main')
@section('foot-script')
    <script src="{{ secure_asset('js/jquery.js') }}" defer></script>
@endsection('foot-script')