<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
        <title>管理者ログイン</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ secure_asset('css/style.css') }}" rel="stylesheet">
    </head>
    <body class="text-center bg-light">
        <div class="header fixed-top p-2 bg-primary text-white">
            <p class="d-flex align-items-center justify-content-center h5 font-weight-bold my-2">ログイン</p>
        </div>
        <div class="main container">
            <h1 class="pt-5 font-weight-bold" style="color:dodgerblue;"><i class="fas fa-fish"></i> 釣りコミ</h1>
            <div class="container">
                <form class="form-signin py-3" method="POST" action="{{ route('admin.login') }}">
                    @csrf
                <input type="email" id="email" class="form-control @error('name') is-invalid @enderror my-3" name="email" value="{{ old('email') }}" placeholder="メールアドレス" required autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    <input type="password" id="password" class="form-control @error('password') is-invalid @enderror my-3" name="password" placeholder="パスワード" required>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('messages.Remember Me') }}
                            </label>
                        </div>
                    <input type="submit" class="btn btn-primary btn-block font-weight-bold" value="ログイン">
                </form>
            </div>
        </div>
    
        </div>
    </body>
</html>