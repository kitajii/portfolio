@extends('layouts.admin.layout')

@section('title','釣果詳細（管理者）')

@section('head-script')
    <script>
    // 現在地取得処理
    function initMap() {
        // Geolocation APIに対応している
        if (navigator.geolocation) {
            // 現在地を取得(watchPositionで自動更新)
            navigator.geolocation.watchPosition(
                // 取得成功した場合
                function(position) {
                    // 記事の位置情報を取得した場合
                    if( {{ $article->latitude }} && {{ $article->longitude }} ) {
                        // 緯度・経度を変数に格納
                        var pointLat = {{ $article->latitude }};
                        var pointLng = {{ $article->longitude }};
                        var pointLatLng = new google.maps.LatLng(pointLat, pointLng);
                        // 初回のみマップ作成
                        if(!map) {
                            // マップオプションを変数に格納
                            var mapOptions = {
                                zoom : 15,          // 拡大倍率
                                center : pointLatLng,  // 緯度・経度
                                zoomControl: false,  // 拡大縮小ボタン非表示
                                streetViewControl: false, //ストリートビュー非表示
                                mapTypeControl: false,  //マップタイプ切り替えボタン非表示
                                fullscreenControl: false  //全画面ボタン非表示
                            };
                            // マップオブジェクト作成
                            var map = new google.maps.Map(
                                document.getElementById('map'), // マップを表示する要素
                                mapOptions         // マップオプション
                            );
                        }
                        // マップにマーカーを表示する
                        var marker = new google.maps.Marker({
                            map : map,             // 対象の地図オブジェクト
                            position : pointLatLng   // 緯度・経度
                        });
                    // 記事の位置情報が取得できなかった場合
                    } else {
                        alert("記事の位置情報が取得できませんでした");
                        }
                    
                },
                // 取得失敗した場合
                function(error) {
                // エラーメッセージを表示
                    switch(error.code) {
                        case 1: // PERMISSION_DENIED
                            alert("位置情報の利用が許可されていません");
                            break;
                        case 2: // POSITION_UNAVAILABLE
                            alert("現在位置が取得できませんでした");
                            break;
                        case 3: // TIMEOUT
                            alert("タイムアウトになりました");
                            break;
                        default:
                            alert("その他のエラー(エラーコード:"+error.code+")");
                            break;
                    }
                }
            );
        // Geolocation APIに対応していない
        } else {
            alert("この端末では位置情報が取得できません");
        }
    }
  </script>
@endsection('head-script')

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
                        <a href="{{ route('admin_profile_detail', ['id'=>$article->user_id]) }}" class="text-decoration-none text-right" style="display: block; width: 64px; height: 64px; border-radius: 50%;">
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
                @if(!empty($article->image_path))
                <image src="{{ asset('storage/images/image/'. $article->image_path) }}" class="mx-auto shadow" style="width: 100%;"></image>
                @endif
                @if(!empty($article->comment))
                <p class="mt-2 text-left">{{ $article->comment }}</p>
                @endif
            </div>
            <div class="my-3">
                <p class="my-0">ポイント（クリックで拡大表示）</p>
                <a href="{{ action('Admin\ArticleController@point', ['id'=>$article->id]) }}">
                    <div id="map" class="detail-map shadow-sm"></div>
                </a>
            </div>
            <div class="text-right">
                <a class="btn btn-outline-primary btn-sm px-4" href="{{ action('Admin\ArticleController@edit', ['id'=>$article->id]) }}">編集</a>
                &nbsp;
                <form class="d-inline" action="{{ action('Admin\ArticleController@delete', ['id'=>$article->id]) }}" method="post">
                    @method('delete')
                    @csrf
                    <input type="submit" class="btn btn-outline-danger btn-sm px-4" value="削除">
                </form>
            </div>
        </div>
    </div>
@endsection('main')

@section('foot-script')
   <script src="{{ config('services.google-map.apikey') }}"></script>
@endsection('foot-script')