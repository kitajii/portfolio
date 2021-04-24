@extends('layouts.layout')

@section('title','プロフィール編集')

@section('main')
    <div class="main container">
        <form action={{  }} class="py-1">
            <div class="form-group p-3 my-2 bg-white shadow-sm rounded">
                <p class="h5 mb-2 font-weight-bold">ユーザー名</p>
                <input type="text" id="inputName" class="form-control form-control-sm d-inline" style="width:200px"
                    required>
            </div>
            <div class="form-group p-3 my-2 bg-white shadow-sm rounded">
                <p class="h5 mb-2 font-weight-bold">アイコン</p>
                <button type="button" class="btn btn-outline-primary btn-sm">写真を選択</button>
            </div>
            <div class="form-group p-3 my-2 bg-white shadow-sm rounded">
                <p class="h5 mb-2 font-weight-bold">年齢</p>
                <div class="form-inline justify-content-center">
                    <input type="number" step="1" 　id="inputSize" class="form-control form-control-sm"
                        style="width:50px" required>&nbsp;<span>歳</span>
                </div>
            </div>
            <div class="form-group p-3 my-2 bg-white shadow-sm rounded">
                <p class="h5 mb-2 font-weight-bold">釣り歴</p>
                <div class="form-inline justify-content-center">
                    <input type="number" id="inputSize" class="form-control form-control-sm" style="width:50px"
                        required>&nbsp;<span>年</span>
                </div>
            </div>
            <div class="form-group p-3 my-2 bg-white shadow-sm rounded">
                <p class="h5 mb-2 font-weight-bold">自己紹介</p>
                <textarea class="form-control" style="resize:none" name="comment" id="comment" rows="3"></textarea>
            </div>
            <button class="btn btn-primary btn-block font-weight-bold mt-3 mx-auto" style="width: 200px;"
                type="submit">更新</button>
        </form>
    </div>
@endsection('main')