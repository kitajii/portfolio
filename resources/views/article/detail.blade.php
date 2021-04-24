@extends('layouts.layout')

@section('title','釣果詳細')



@section('main')
    <div class="main container">
        <div class="p-3 my-2 bg-white shadow-sm rounded">
                    <div class="item-top mx-auto">
                        <p class="h5 d-inline align-middle mx-2">2021年7月7日</p>
                        <p class="h5 d-inline align-middle mx-2">07:10</p>
                        <i class="fas fa-sun fa-3x text-warning align-middle mx-2"></i>
                    </div>
            <div class="row">
                <div class="col-5">
                    <a href="#" class="mx-auto mt-3"
                        style="display: block; width: 64px; height: 64px; border-radius: 50%;">
                        <div class="bg-secondary text-light py-3 rounded-circle" style="width: 64px; height: 64px;">アイコン
                        </div>
                    </a>
                </div>
                <div class="col-7">
                    <p class="h5 pt-4 m-0 text-left">ユーザー名</p>
                    <p class="pt-1 m-0 text-left">釣り歴5年</p>
                </div>
                <p class="h5 pt-4 my-0 mx-auto">サイズ：30cm</p>
            </div>
            <div class="my-3">
                <div class="bg-secondary mx-auto text-light py-5" style="width: 100%; height: 180px;">写真</div>
            </div>
            <div class="my-3">
                <p class="my-0">ポイント</p>
                <div class="bg-secondary mx-auto text-light py-5" style="width: 100%; height: 100px;">地図</div>
            </div>
            <div class="text-left">
                <p>コメントコメントコメントコメントコメントコメントコメントコメントコメント</p>
            </div>
            <div class="text-right"><a href="#">編集</a>&nbsp;/&nbsp;<a href="#">削除</a></div>
        </div>
    </div>
@endsection('main')