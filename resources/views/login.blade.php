<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <title>ログイン</title>
</head>

<body class="text-center bg-light">
    <div class="header fixed-top p-2 bg-primary text-white">
        <p class="d-flex align-items-center justify-content-center h5 font-weight-bold my-2">ログイン</p>
    </div>
    <div class="main container">
        <h1 class="pt-5 font-weight-bold" style="color:dodgerblue;"><i class="fas fa-fish"></i> 釣りコミ</h1>
        <div class="container">
            <form class="form-signin py-3">
                <input type="email" id="inputEmail" class="form-control my-3" placeholder="メールアドレス" required>
                <input type="password" id="inputPassword" class="form-control my-3" placeholder="パスワード" required>
                <input type="submit" class="btn btn-primary btn-block font-weight-bold" value="ログイン">
            </form>
        </div>
        <div class="container">
            <a href="#" type="button" class="btn btn-success btn-block font-weight-bold">新規登録</a>
        </div>
    </div>

    </div>
</body>

</html>