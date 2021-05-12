
@extends('layouts.admin.layout')

@section('title','マップ（管理者）')

@section('head-script')
    <script>
    // 現在地取得処理
    function initMap() {
        var map = null;
        var infowindow = new google.maps.InfoWindow();
        var gmarkers = [0];
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
                    	google.maps.event.addListener(map, "click", function() {infowindow.close();});
                    }

                    // 現在地にマーカーを表示する
                    var currentMarker = new google.maps.Marker({
                        map : map,             // 対象の地図オブジェクト
                        position : myLatLng,   // 緯度・経度
                        icon : "https://maps.google.com/mapfiles/ms/icons/green-dot.png"
                    });
                    
                    var articleData = {!! $article_data !!}; //ArticleControllerで作った記事の位置情報データの配列
                    
                    for (var i = 0; i < articleData.length; i++) {
                    
                    	var point = new google.maps.LatLng({lat: articleData[i]['lat'], lng: articleData[i]['lng']});
                    	
                    	var marker = create_maker(point,
                            `<a href="${articleData[i]['url']}">
                                <img src="${articleData[i]['icon']}" class="rounded-circle border" style="width: 64px; height: 64px;"></image>
                                <p class="my-0">${articleData[i]['name']}</p>
                                <p class="my-1">${articleData[i]['created_at']}</p>
                            </a>`
                        );

                        // var articleMarker = new google.maps.Marker({
                            // map : map,             // 対象の地図オブジェクト
                            // position : articleLatLng   // 緯度・経度
                        // });
                    }
                    
                    function create_maker(latlng, html) {
                    	// マーカーを生成
                    	var marker = new google.maps.Marker({position: latlng, map: map});
                    	// マーカーをクリックした時の処理
                    	google.maps.event.addListener(marker, "click", function() {
                    		infowindow.setContent(html);
                    		infowindow.open(map, marker);
                    	});
            	        var i = 0;
                    	gmarkers[i] = marker;
                    	i++;
                    	return marker;
                    }
                    
                    function map_click(i) {
                    	google.maps.event.trigger(gmarkers[i], "click");
                    }
                    
                    google.maps.event.addDomListener(window, "load", initMap);

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
