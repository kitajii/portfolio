<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <title>○○のページ</title>
</head>

<body class="text-center bg-light text-secondary" style="margin: 56px 0 80px 0;">
    <!-- header -->
    <div class="header fixed-top p-2 bg-primary text-white">
        <p class="d-flex align-items-center justify-content-center h5 font-weight-bold my-2">○○のページ</p>
    </div>
    <!-- main -->
    <div class="main py-1">
        <div class="p-3 my-2 mx-3 bg-white shadow-sm rounded">
            <div class="my-4">
                <a href="#" class="mx-auto" style="display: block; width: 64px; height: 64px; border-radius: 50%;">
                    <div class="bg-secondary text-light py-3 rounded-circle" style="width: 64px; height: 64px;">アイコン
                    </div>
                </a>
                <p class="h5 my-3">ユーザー名</p>
            </div>
            <div class="px-4 text-left">
                <div class="d-flex justify-content-around">
                    <p class="d-inline">年齢：26歳</p>
                    <p class="d-inline">釣り歴：5年</p>
                </div>
                <p class="">コメントコメントコメントコメントコメントコメントコメントコメントコメント</p>
            </div>
            <div class="text-right">
                <a href="#">編集</a>
            </div>
        </div>
        <ul class="list-unstyled mb-0">
            <a class="text-secondary text-decoration-none" href="https://www.google.co.jp/">
                <li class="border-bottom py-3">
                    <div class="item-top mx-auto">
                        <p class="h5 d-inline align-middle mx-2">2021年7月7日</p>
                        <p class="h5 d-inline align-middle mx-2">07:10</p>
                        <i class="fas fa-sun fa-2x text-warning align-middle mx-2"></i>
                    </div>
                    <div class="item-bottom d-flex justify-content-around">
                        <div class="col-4 px-0">
                            <object>
                                <a href="https://www.youtube.com/" class="mx-auto mt-3 text-decoration-none"
                                    style="display: block; width: 64px; height: 64px; border-radius: 50%;">
                                    <div class="bg-secondary text-light py-3 rounded-circle"
                                        style="width: 64px; height: 64px;">アイコン</div>
                                </a>
                            </object>
                        </div>
                        <div class="col-4 px-0 text-left">
                            <p class="h6 pt-3 m-0" style="line-height: 48px;">ユーザー名</p>
                        </div>
                        <div class="col-4 p-0">
                            <p class="h3 pt-3 pr-5 m-0" style="line-height: 48px;">30cm</p>
                        </div>
                    </div>
                </li>
            </a>
            <a class="text-secondary text-decoration-none" href="https://www.google.co.jp/">
                <li class="border-bottom py-3">
                    <div class="item-top mx-auto">
                        <p class="h5 d-inline align-middle mx-2">2021年7月7日</p>
                        <p class="h5 d-inline align-middle mx-2">07:10</p>
                        <i class="fas fa-sun fa-2x text-warning align-middle mx-2"></i>
                    </div>
                    <div class="item-bottom d-flex justify-content-around">
                        <div class="col-4 px-0">
                            <object>
                                <a href="https://www.youtube.com/" class="mx-auto mt-3 text-decoration-none"
                                    style="display: block; width: 64px; height: 64px; border-radius: 50%;">
                                    <div class="bg-secondary text-light py-3 rounded-circle"
                                        style="width: 64px; height: 64px;">アイコン</div>
                                </a>
                            </object>
                        </div>
                        <div class="col-4 px-0 text-left">
                            <p class="h6 pt-3 m-0" style="line-height: 48px;">ユーザー名</p>
                        </div>
                        <div class="col-4 p-0">
                            <p class="h3 pt-3 pr-5 m-0" style="line-height: 48px;">30cm</p>
                        </div>
                    </div>
                </li>
            </a>
            <a class="text-secondary text-decoration-none" href="https://www.google.co.jp/">
                <li class="border-bottom py-3">
                    <div class="item-top mx-auto">
                        <p class="h5 d-inline align-middle mx-2">2021年7月7日</p>
                        <p class="h5 d-inline align-middle mx-2">07:10</p>
                        <i class="fas fa-sun fa-2x text-warning align-middle mx-2"></i>
                    </div>
                    <div class="item-bottom d-flex justify-content-around">
                        <div class="col-4 px-0">
                            <object>
                                <a href="https://www.youtube.com/" class="mx-auto mt-3 text-decoration-none"
                                    style="display: block; width: 64px; height: 64px; border-radius: 50%;">
                                    <div class="bg-secondary text-light py-3 rounded-circle"
                                        style="width: 64px; height: 64px;">アイコン</div>
                                </a>
                            </object>
                        </div>
                        <div class="col-4 px-0 text-left">
                            <p class="h6 pt-3 m-0" style="line-height: 48px;">ユーザー名</p>
                        </div>
                        <div class="col-4 p-0">
                            <p class="h3 pt-3 pr-5 m-0" style="line-height: 48px;">30cm</p>
                        </div>
                    </div>
                </li>
            </a>
            <a class="text-secondary text-decoration-none" href="https://www.google.co.jp/">
                <li class="border-bottom py-3">
                    <div class="item-top mx-auto">
                        <p class="h5 d-inline align-middle mx-2">2021年7月7日</p>
                        <p class="h5 d-inline align-middle mx-2">07:10</p>
                        <i class="fas fa-sun fa-2x text-warning align-middle mx-2"></i>
                    </div>
                    <div class="item-bottom d-flex justify-content-around">
                        <div class="col-4 px-0">
                            <object>
                                <a href="https://www.youtube.com/" class="mx-auto mt-3 text-decoration-none"
                                    style="display: block; width: 64px; height: 64px; border-radius: 50%;">
                                    <div class="bg-secondary text-light py-3 rounded-circle"
                                        style="width: 64px; height: 64px;">アイコン</div>
                                </a>
                            </object>
                        </div>
                        <div class="col-4 px-0 text-left">
                            <p class="h6 pt-3 m-0" style="line-height: 48px;">ユーザー名</p>
                        </div>
                        <div class="col-4 p-0">
                            <p class="h3 pt-3 pr-5 m-0" style="line-height: 48px;">30cm</p>
                        </div>
                    </div>
                </li>
            </a>
            
        </ul>

    </div>
    <!-- nav-bar -->
    <div class="footer fixed-bottom bg-light border d-flex justify-content-around" style="height: 60px">
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
    </div>
</body>

</html>