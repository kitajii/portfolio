<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
        <title>新規登録</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ secure_asset('css/style.css') }}" rel="stylesheet">
    </head>

    <body class="text-center bg-light">
        <div class="header fixed-top p-2 bg-primary text-white">
            <p class="d-flex align-items-center justify-content-center h5 font-weight-bold my-2">新規登録</p>
        </div>
        <div class="main container">
            <h1 class="pt-5 font-weight-bold" style="color:dodgerblue;"><i class="fas fa-fish"></i> 釣りコミ</h1>
            <div class="container">
                <form class="py-3" method="POST" action="{{ route('register') }}">
                    @csrf
                    <input type="text" id="name" class="form-control @error('name') is-invalid @enderror my-3"  placeholder="ユーザー名" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    <input type="email" id="inputEmail" class="form-control @error('email') is-invalid @enderror my-3" placeholder="メールアドレス" name="email" value="{{ old('email') }}" autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    <input type="password" id="inputPassword" class="form-control @error('password') is-invalid @enderror my-3" placeholder="パスワード" name="password" autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    <input type="password" id="password-confirm" class="form-control my-3" placeholder="パスワード（再入力）" name="password_confirmation" autocomplete="new-password">
                    <input class="btn btn-success btn-block font-weight-bold" type="submit" value="新規登録">
                    
                </form>
                <a href="{{ route('login') }}" type="button" class="btn btn-primary btn-block font-weight-bold">ログインページへ</a>

            </div>
        </div>
    
        </div>
    </body>

</html>