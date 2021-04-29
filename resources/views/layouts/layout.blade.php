<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
        <title>@yield('title')</title>
        <script src="{{ secure_asset('js/app.js') }}" defer></script>
        @yield('head-script')
        
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ secure_asset('css/style.css') }}" rel="stylesheet">

    </head>
    
    <body class="text-center bg-light text-secondary">
        <!-- header -->
        <header class="fixed-top p-2 bg-primary text-white">
            <p class="d-flex align-items-center justify-content-center h5 font-weight-bold my-2">@yield('title')</p>
        </header>
        
        @yield('main')
    
        <!-- nav-bar -->
        <footer class="fixed-bottom bg-light border d-flex justify-content-around">
            <div class="nav-item col-4">
                <a class="h-100" style="display: block" href="{{ route('profile_detail', ['id'=>Auth::id()]) }}">
                    <i class="fas fa-user fa-2x" style="line-height: 60px"></i>
                </a>
            </div>
            <div class="nav-item col-4">
                <a class="h-100" style="display: block" href="{{ action('ArticleController@map') }}">
                    <i class="fas fa-map-marked fa-2x" style="line-height: 60px"></i>
                </a>
            </div>
            <div class="nav-item col-4">
                <a class="h-100" style="display: block" href="{{ action('ArticleController@list') }}">
                <i class="fas fa-clipboard-list fa-2x" style="line-height: 60px"></i>
                </a>
            </div>
        </footer>
    @yield('foot-script')
    </body>
</html>