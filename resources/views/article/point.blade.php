<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <title>ポイント詳細</title>
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyAQ7GF8UWRS03uApoVVzF2v_3a4VrFPxpo&language=ja"></script>

</head>

<body class="text-center bg-light text-secondary">
    <!-- header -->
    <header class="fixed-top p-2 bg-primary text-white">
        <p class="d-flex align-items-center justify-content-center h5 font-weight-bold my-2">ポイント詳細</p>
    </header>
    <!-- main -->
    <div class="map-container">
        <div id="map">
        </div>
        <a href="https://www.google.co.jp/" class="create-button rounded-circle" style="display: block; width: 66px; border-radius: 50%;">
            <i class="fas fa-pen fa-2x align-middle border p-3 bg-light text-secondary rounded-circle"></i>
        </a>
    </div>
    <!-- nav-bar -->
    <footer class="fixed-bottom bg-light border d-flex justify-content-around">
        <div class="nav-item col-4">
            <a class="h-100" style="display: block" href="#"><i class="fas fa-user fa-2x"
                    style="line-height: 60px"></i></a>
        </div>
        <div class="nav-item col-4">
            <a class="h-100" style="display: block" href="#"><i class="fas fa-map-marked fa-2x"
                    style="line-height: 60px"></i></a>
        </div>
        <div class="nav-item col-4">
            <a class="h-100" style="display: block" href="#"><i class="fas fa-clipboard-list fa-2x"
                    style="line-height: 60px"></i></a>
        </div>
    </footer>
</div>
    <script>
        var MyLatLng = new google.maps.LatLng(35.6811673, 139.7670516);
        var Options = {
            zoom: 15,      //地図の縮尺値
            center: MyLatLng,    //地図の中心座標
            mapTypeId: 'roadmap'   //地図の種類
        };
        var map = new google.maps.Map(document.getElementById('map'), Options);
    </script>
</body>

</html>