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
    <title>プロフィール編集</title>
</head>

<body class="text-center bg-light text-secondary" style="margin: 56px 0 80px 0;">
    <!-- header -->
    <div class="header fixed-top p-2 bg-primary text-white">
        <p class="d-flex align-items-center justify-content-center h5 font-weight-bold my-2">プロフィール編集</p>
    </div>
    <!-- main -->
    <div class="main container">
        <form class="py-1">
            <div class="form-group p-3 my-2 bg-white shadow-sm rounded">
                <p class="h5 mb-2 font-weight-bold">ユーザー名</p>
                <input type="text" id="inputName" class="form-control form-control-sm d-inline" style="width:200px"
                    required>
            </div>
            <div class="form-group p-3 my-2 bg-white shadow-sm rounded">
                <p class="h5 mb-2 font-weight-bold">アイコン</p>
                <button type="button" class="btn btn-outline-primary btn-sm">写真を選択</button>
            </div>
            <div class="form-group p-3 my-2 bg-white shadow-sm rounded">
                <p class="h5 mb-2 font-weight-bold">年齢</p>
                <div class="form-inline justify-content-center">
                    <input type="number" step="1" 　id="inputSize" class="form-control form-control-sm"
                        style="width:50px" required>&nbsp;<span>歳</span>
                </div>
            </div>
            <div class="form-group p-3 my-2 bg-white shadow-sm rounded">
                <p class="h5 mb-2 font-weight-bold">釣り歴</p>
                <div class="form-inline justify-content-center">
                    <input type="number" id="inputSize" class="form-control form-control-sm" style="width:50px"
                        required>&nbsp;<span>年</span>
                </div>
            </div>
            <div class="form-group p-3 my-2 bg-white shadow-sm rounded">
                <p class="h5 mb-2 font-weight-bold">自己紹介</p>
                <textarea class="form-control" style="resize:none" name="comment" id="comment" rows="3"></textarea>
            </div>
            <button class="btn btn-primary btn-block font-weight-bold mt-3 mx-auto" style="width: 200px;"
                type="submit">更新</button>
        </form>
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