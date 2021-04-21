<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"-->
        <!--    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">-->
            
        <!--<link rel="stylesheet" href="css/style.css">-->
        
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
        <title>@yield('title')</title>
        @yield('headscript')
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
    @yield('footscript')
    </body>
</html>