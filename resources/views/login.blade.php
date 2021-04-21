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
            <form class="form-signin py-3" method="POST" action="{{ route('login') }}">
                @csrf
                <input type="email" id="email" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} name="email" value="{{ old('email') }} my-3" placeholder="メールアドレス" required autofocus>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                <input type="password" id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} my-3" name="password" placeholder="パスワード" required>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                        </label>
                    </div>
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