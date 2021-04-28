
@extends('layouts.layout')

@section('title','マップ')

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
                    // 緯度・経度を変数に格納
                    var mapLat = position.coords.latitude;
                    var mapLng = position.coords.longitude;
                    var mapLatLng = new google.maps.LatLng(mapLat, mapLng);
                    // 初回のみマップ作成
                    if(!map) {
                        // マップオプションを変数に格納
                        var mapOptions = {
                            zoom : 15,          // 拡大倍率
                            center : mapLatLng  // 緯度・経度
                        };
                        // マップオブジェクト作成
                        var map = new google.maps.Map(
                            document.getElementById('map'), // マップを表示する要素
                            mapOptions         // マップオプション
                        );
                    }
                    //　マップにマーカーを表示する
                    var marker = new google.maps.Marker({
                        map : map,             // 対象の地図オブジェクト
                        position : mapLatLng   // 緯度・経度
                    });
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
    <div class="map-container">
        <div id="map">
        </div>
        <form action="{{ action('ArticleController@create') }}" id="send-latlng">
            <input type="hidden" value="">
            <button type="button" class="btn btn-success shadow-sm border-light font-weight-bold" style="position:fixed; bottom:84px; right:65px;">現在地で釣果を投稿する <i class="fas fa-pen text-light"></i></button>

            <!--<button class="create-button btn btn-primary btn-block font-weight-bold mt-3 mx-auto" type="submit" style="width: 200px;" value="現在地で釣果を記録する">-->
                <!--<i class="fas fa-pen fa-2x align-middle border p-3 bg-light text-secondary rounded-circle"></i>-->
            <!--</button>-->
        </form>
    </div>
@endsection('main')

@section('foot-script')
   <script src="{{ config('services.google-map.apikey') }}"></script>
@endsection('foot-script')
