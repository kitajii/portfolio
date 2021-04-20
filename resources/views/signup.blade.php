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
    <title>新規登録</title>
</head>

<body class="text-center bg-light">
    <div class="header fixed-top p-2 bg-primary text-white">
        <p class="d-flex align-items-center justify-content-center h5 font-weight-bold my-2">新規登録</p>
    </div>
    <div class="main container">
        <h1 class="pt-5 font-weight-bold" style="color:dodgerblue;"><i class="fas fa-fish"></i> 釣りコミ</h1>
        <div class="container">
            <form class="form-signin py-3">
                <input type="text" id="inputName" class="form-control my-3" placeholder="ユーザー名" required>
                <input type="email" id="inputEmail" class="form-control my-3" placeholder="メールアドレス" required>
                <input type="password" id="inputPassword" class="form-control my-3" placeholder="パスワード" required>
                <input type="password" id="password-confirm" class="form-control my-3" placeholder="パスワード（再入力）" required
                    autocomplete="new-password">
                <input class="btn btn-success btn-block font-weight-bold" type="submit" value="新規登録">
            </form>
        </div>
    </div>

    </div>
</body>

</html>