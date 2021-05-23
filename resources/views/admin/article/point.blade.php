@extends('layouts.admin.layout')

@section('title','ポイント詳細/編集（管理者）')

@section('head-script')
    <script>
    var prevInfoWindow;
    var prevSet = false;
    // 現在地取得処理
    function initMap() {
        // Geolocation APIに対応している
        if (navigator.geolocation) {
            // 現在地を取得(watchPositionで自動更新)
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
                            
                        // マップに記事登録地点のマーカーを表示する
                        var marker = new google.maps.Marker({
                            map : map,             // 対象の地図オブジェクト
                            position : pointLatLng   // 緯度・経度
                        });
                            
                            
                        //以下、ロングタップの処理
                        google.maps.event.addListener(map, 'mousedown', function (event) {
                           start = new Date().getTime();
                        });
                            
                        google.maps.event.addListener(map, 'mouseup', function (event) {
                            if (start) {
                                end = new Date().getTime();
                                longpress = (end - start < 1500) ? false : true; //長押し：1.5秒
                                
                                if(longpress){
                                    
                                    var newLat = event.latLng.lat();
                                    var newLng = event.latLng.lng();
                                    
                                    document.getElementById('newLat').value = newLat;
                                    document.getElementById('newLng').value = newLng;
                                    
                                    var html = '<button form="newlatlng" type="submit" class="btn btn-success shadow-sm border-light font-weight-bold"">この場所にポイントを変更</button>'
                                    
                                    var infoWindow = new google.maps.InfoWindow( {
                                    	position: new google.maps.LatLng( newLat,newLng ) ,
                                    	content: html,
                                    });
                                    
                                    if(prevSet) {
                                        prevInfoWindow.close();
                                    }
                                    infoWindow.open( map ) ;
                                    prevInfoWindow = infoWindow;
                                    prevSet = true;
                                    
                                }
                            }
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
        <form id="newlatlng" method="post" action="{{ action('Admin\ArticleController@update') }}">
            @csrf
            @method('patch')
            <input id="id" name="id" type="hidden" value="{{ $article->id }}">
            <input id="weather_id" name="weather_id" type="hidden" value="{{ $article->weather_id }}">
            <input id="size" name="size" type="hidden" value="{{ $article->size }}">
            <input id="newLat" name="latitude" type="hidden" value="">
            <input id="newLng" name="longitude" type="hidden" value="">
        </form>
        <p class="bg-success text-light p-2 rounded" style="position:fixed; bottom:84px; right:65px;">画面長押し：ポイント更新ボタンを表示</p>
    </div>
@endsection('main')

@section('foot-script')
   <script src="{{ config('services.google-map.apikey') }}"></script>
@endsection('foot-script')
