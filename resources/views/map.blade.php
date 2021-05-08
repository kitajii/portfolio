
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
                    var myLat = position.coords.latitude;
                    var myLng = position.coords.longitude;
                    var myLatLng = new google.maps.LatLng(myLat, myLng);
                    
                    // formのvalueに緯度・経度を渡す
                    document.getElementById('lat').value = myLat;
                    document.getElementById('lng').value = myLng;
                    
                    // 初回のみマップ作成
                    if(!map) {
                        // マップオプションを変数に格納
                        var mapOptions = {
                            zoom : 15,              // 拡大倍率
                            center : myLatLng,      // 緯度・経度
                        	restriction: {          // 表示範囲の制限(琵琶湖周辺のみ)
                        		latLngBounds: {
                        			north : 35.6,
                        			south : 34.9,
                        			west : 135.8,
                        			east : 136.4
                        		},
                        		strictBounds: true
                        	}
                        };
                        // マップオブジェクト作成
                        var map = new google.maps.Map(
                            document.getElementById('map'),     // マップを表示する要素
                            mapOptions                          // マップオプション
                        );
                    }
                    // 現在地にマーカーを表示する
                    var currentMarker = new google.maps.Marker({
                        map : map,             // 対象の地図オブジェクト
                        position : myLatLng,   // 緯度・経度
                        icon : "https://maps.google.com/mapfiles/ms/icons/green-dot.png"
                    });
                    
                    var articleData = {{ $article_data }};
                    
                    for (var i = 0; i < articleData.length; i++) {
                        articleLatLng = new google.maps.LatLng({lat: articleData[i]['lat'], lng: articleData[i]['lng']});
                            var articleMarker = new google.maps.Marker({
                            map : map,             // 対象の地図オブジェクト
                            position : articleLatLng   // 緯度・経度
                        });
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
    <div class="map-container">
        <div id="map" class="map">
        </div>
        <form id="latlng" method="post" action="{{ action('ArticleController@add') }}">
            @csrf
            <input id="lat" name="lat" type="hidden" value="">
            <input id="lng" name="lng" type="hidden" value="">
            <button type="submit" class="btn btn-success shadow-sm border-light font-weight-bold" style="position:fixed; bottom:84px; right:65px;">
                現在地で釣果を投稿する <i class="fas fa-pen text-light"></i>
            </button>
        </form>
    </div>
@endsection('main')

@section('foot-script')
   <script src="{{ config('services.google-map.apikey') }}"></script>
@endsection('foot-script')
