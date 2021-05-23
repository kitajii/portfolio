@extends('layouts.layout')

@section('title','ポイント詳細')

@section('head-script')
    <script>
    // 現在地取得処理
    function initMap() {
        // Geolocation APIに対応している
        if (navigator.geolocation) {
            // 現在地を取得
            navigator.geolocation.getCurrentPosition(
                // 取得成功した場合
                function(position) {
                
                    // 現在地の緯度・経度を変数に格納
                    var myLat = position.coords.latitude;
                    var myLng = position.coords.longitude;
                    var myLatLng = new google.maps.LatLng(myLat, myLng);
                    
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
                                center : pointLatLng  // 緯度・経度
                            };
                            
                            // マップオブジェクト作成
                            var map = new google.maps.Map(
                                document.getElementById('map'), // マップを表示する要素
                                mapOptions         // マップオプション
                            );
                        }
                        
                        // 現在地にマーカーを表示する
                        var currentMarker = new google.maps.Marker({
                            map : map,             // 対象の地図オブジェクト
                            position : myLatLng,   // 緯度・経度
                            icon : "https://maps.google.com/mapfiles/ms/icons/green-dot.png"
                        });
                        
                        // マップにポイントのマーカーを表示する
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
    <div class="map-container">
        <div id="map" class="map">
        </div>
    </div>
@endsection('main')

@section('foot-script')
   <script src="{{ config('services.google-map.apikey') }}"></script>
@endsection('foot-script')
