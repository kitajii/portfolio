<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
        <title>釣果一覧</title>
        <script src="{{ secure_asset('js/app.js') }}" defer></script>
        <script src="{{ secure_asset('js/jquery.js') }}" defer></script>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ secure_asset('css/style.css') }}" rel="stylesheet">
    </head>
    

<body class="text-center bg-light text-secondary">
    <!-- header -->
    <header class="fixed-top bg-primary text-white">
        <div class="d-flex justify-content-between">
            <div style="width: 50px;"></div>
            <p class="h5 font-weight-bold my-3">釣果一覧</p>
            <i id="open-search" class="fas fa-search fa-lg text-white"></i>
            <i id="close-search" class="fas fa-times fa-lg text-white"></i>
        </div>
    </header>
    <!-- main -->
    <div class="main">
        <!-- 絞り込み -->
        <div id="narrow-down" class="narrow-down bg-primary text-white text-center fixed-top" style="z-index: 10; margin-top: 56px; height: 360px;">
            <form class="mx-auto" action="{{ action('ArticleController@list') }}">
                <div class="p-2 border-top">
                    <p class="mb-1">期間</p>
                    <input type="date" name="from_date" style="font-size:13px; line-height: unset;">
                    <span>〜</span>
                    <input type="date" name="until_date" style="font-size:13px; line-height: unset;">
                </div>
                <div class="p-2 border-top">
                    <p class="mb-1">時間帯</p>
                    <input type="time" name="from_time">
                    <span>〜</span>
                    <input type="time" name="until_time">
                </div>
                <div class="p-2 border-top">
                    <p class="mb-1">天気</p>
                    <select class="form-select form-select-sm" name="weather_id" style="line-height: unset;">
                        <option value="" selected>-</option>
                        <option value="1">晴れ</option>
                        <option value="2">曇り</option>
                        <option value="3">雨</option>
                    </select>
                </div>
                <div class="p-2 border-top">
                    <p class="mb-1">サイズ</p>
                    <input type="number" name="from_size" style="width:50px line-height: unset;">
                    <span>〜</span>
                    <input type="number" name="to_size" style="width:50px line-height: unset;">
                    <span>㎝</span>
                </div>
                <button class="btn btn-light btn-block btn-sm font-weight-bold my-3 mx-auto text-secondary"
                    style="width: 200px;" type="submit">絞り込み検索</button>
            </form>
        </div>
        @if(count($articles) > 0)
        @foreach($articles as $article)
        <ul class="list-unstyled mb-0">
            <a class="text-secondary text-decoration-none" href="{{ route('article_detail', ['id'=>$article->id]) }}">
                <li class="border-bottom py-3">
                    <div class="item-top mx-auto">
                        <p class="d-inline align-middle mx-2">{{ $article->created_at->format('Y年m月d日 H時i分') }}</p>
                            @if($article->weather_id == 1)
                            <i class="fas fa-sun fa-2x text-warning align-middle mx-2"></i>
                            @elseif($article->weather_id == 2)
                            <i class="fas fa-cloud fa-2x text-secondary align-middle mx-2"></i>
                            @elseif($article->weather_id == 3)
                            <i class="fas fa-umbrella fa-2x text-primary align-middle mx-2"></i>
                            @else
                            @endif
                    </div>
                    <div class="item-bottom d-flex justify-content-around">
                        <div class="col-4 px-0">
                            <object>
                                <a href="{{ route('profile_detail', ['id'=>$article->user_id]) }}" class="mx-auto mt-2 text-decoration-none" style="display: block; width: 64px; height: 64px; border-radius: 50%;">
                                    <image src="{{ $article->user->profile->icon_path }}" class="rounded-circle border" style="width: 64px; height: 64px;"></image>
                                </a>
                            </object>
                        </div>
                        <div class="col-4 px-0 text-left">
                            <p class="h6 pt-3 m-0" style="line-height: 48px;">{{ $article->user->profile->name }}</p>
                        </div>
                        <div class="col-4 p-0">
                            <p class="h3 pt-3 pr-5 m-0" style="line-height: 48px;">{{ $article->size }}cm</p>
                        </div>
                    </div>
                </li>
            </a>
        </ul>
        @endforeach
        @else
        <p>釣果記録がありません</p>
        @endif
    </div>
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
</body>

</html>