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
    <title>釣果詳細</title>
</head>

<body class="text-center bg-light text-secondary">
    <!-- header -->
    <header class="fixed-top p-2 bg-primary text-white">
        <p class="d-flex align-items-center justify-content-center h5 font-weight-bold my-2">釣果詳細</p>;　
    </header>
    <!-- main -->
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
</body>

</html>