
@extends('layouts.layout')

@section('title','マップ')

@section('head-script')
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyAQ7GF8UWRS03uApoVVzF2v_3a4VrFPxpo&language=ja"></script>
@endsection('head-script')

@section('main')
    <div class="map-container">
        <div id="map">
        </div>
        <a href="https://www.google.co.jp/" class="create-button rounded-circle" style="display: block; width: 66px; border-radius: 50%;">
            <i class="fas fa-pen fa-2x align-middle border p-3 bg-light text-secondary rounded-circle"></i>
        </a>
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
