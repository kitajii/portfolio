@extends('layouts.layout')

@section('title','ポイント詳細')

@section('head-script')
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyAQ7GF8UWRS03uApoVVzF2v_3a4VrFPxpo&language=ja"></script>
@endsection('head-script')

@section('main')
    <div class="map-container">
        <div id="map">
        </div>
    </div>
@endsection('main')

@section('foot-script')
    <script>
        var MyLatLng = new google.maps.LatLng(35.6811673, 139.7670516);
        var Options = {
            zoom: 15,      //地図の縮尺値
            center: MyLatLng,    //地図の中心座標
            mapTypeId: 'roadmap'   //地図の種類
        };
        var map = new google.maps.Map(document.getElementById('map'), Options);
    </script>
@endsection('foot-script')
