<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
        <title>釣果一覧</title>
        <script src="{{ secure_asset('js/app.js') }}" defer></script>

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
        <div id="narrow-down" class="narrow-down bg-primary text-white text-center fixed-top"
            style="z-index: 10; margin-top: 56px; height: 340px;">
            <form class="mx-auto" action="#">
                <div class="period p-2 border-top">
                    <p class="mb-1">期間</p>
                    <select class="form-select form-select-sm" aria-label="from-year">
                        <option selected>-</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                    </select>
                    <span>/</span>
                    <select class="form-select form-select-sm" aria-label="from-month">
                        <option selected>-</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
                    <span>〜</span>
                    <select class="form-select form-select-sm" aria-label="to-year">
                        <option selected>-</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                    </select>
                    <span>/</span>
                    <select class="form-select form-select-sm" aria-label="to-month">
                        <option selected>-</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
                </div>
                <div class="time p-2 border-top">
                    <p class="mb-1">時間帯</p>
                    <select class="form-select form-select-sm" aria-label="from-time">
                        <option selected>-</option>
                        <option value="0">0:00</option>
                        <option value="1">1:00</option>
                        <option value="2">2:00</option>
                        <option value="3">3:00</option>
                        <option value="4">4:00</option>
                        <option value="5">5:00</option>
                        <option value="6">6:00</option>
                        <option value="7">7:00</option>
                        <option value="8">8:00</option>
                        <option value="9">9:00</option>
                        <option value="10">10:00</option>
                        <option value="11">11:00</option>
                        <option value="12">12:00</option>
                        <option value="13">13:00</option>
                        <option value="14">14:00</option>
                        <option value="15">15:00</option>
                        <option value="16">16:00</option>
                        <option value="17">17:00</option>
                        <option value="18">18:00</option>
                        <option value="19">19:00</option>
                        <option value="20">20:00</option>
                        <option value="21">21:00</option>
                        <option value="22">22:00</option>
                        <option value="23">23:00</option>
                    </select>
                    <span>〜</span>
                    <select class="form-select form-select-sm" aria-label="from-time">
                        <option selected>-</option>
                        <option value="0">0:00</option>
                        <option value="1">1:00</option>
                        <option value="2">2:00</option>
                        <option value="3">3:00</option>
                        <option value="4">4:00</option>
                        <option value="5">5:00</option>
                        <option value="6">6:00</option>
                        <option value="7">7:00</option>
                        <option value="8">8:00</option>
                        <option value="9">9:00</option>
                        <option value="10">10:00</option>
                        <option value="11">11:00</option>
                        <option value="12">12:00</option>
                        <option value="13">13:00</option>
                        <option value="14">14:00</option>
                        <option value="15">15:00</option>
                        <option value="16">16:00</option>
                        <option value="17">17:00</option>
                        <option value="18">18:00</option>
                        <option value="19">19:00</option>
                        <option value="20">20:00</option>
                        <option value="21">21:00</option>
                        <option value="22">22:00</option>
                        <option value="23">23:00</option>
                    </select>
                </div>
                <div class="weather p-2 border-top">
                    <p class="mb-1">天気</p>
                    <select class="form-select form-select-sm" aria-label="weather">
                        <option selected>-</option>
                        <option value="2021">晴れ</option>
                        <option value="2022">曇り</option>
                        <option value="2023">雨</option>
                    </select>
                </div>
                <div class="size p-2 border-top">
                    <p class="mb-1">サイズ</p>
                    <select class="form-select form-select-sm" aria-label="from-size">
                        <option selected>-</option>
                        <option value="1">〜19</option>
                        <option value="2">20〜29</option>
                        <option value="3">30〜39</option>
                        <option value="4">40〜49</option>
                        <option value="5">50〜59</option>
                        <option value="6">60〜</option>
                    </select>
                    <span>㎝</span>
                </div>
                <button class="btn btn-light btn-block btn-sm font-weight-bold my-3 mx-auto text-secondary"
                    style="width: 200px;" type="submit">絞り込み検索</button>
            </form>
        </div>
        @if(count($posts) > 0)
        @foreach($posts as $post)
        <ul class="list-unstyled mb-0">
            <a class="text-secondary text-decoration-none" href="https://www.google.co.jp/">
                <li class="border-bottom py-3">
                    <div class="item-top mx-auto">
                        <p class="h5 d-inline align-middle mx-2">{{ $post->created_at->format('Y年m月d日 H時i分') }}</p>
                        <i class="fas fa-sun fa-2x text-warning align-middle mx-2"></i>
                    </div>
                    <div class="item-bottom d-flex justify-content-around">
                        <div class="col-4 px-0">
                            <object>
                                <a href="https://www.youtube.com/" class="mx-auto mt-2 text-decoration-none" style="display: block; width: 64px; height: 64px; border-radius: 50%;">
                                    <image src="{{ asset('storage/images/icon/'. $post->user->profile->icon_path) }}" class="rounded-circle border" style="width: 64px; height: 64px;"></image>
                                </a>
                            </object>
                        </div>
                        <div class="col-4 px-0 text-left">
                            <p class="h6 pt-3 m-0" style="line-height: 48px;">{{ $post->user->profile->name }}</p>
                        </div>
                        <div class="col-4 p-0">
                            <p class="h3 pt-3 pr-5 m-0" style="line-height: 48px;">{{ $post->size }}cm</p>
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
    <script src="{{ secure_asset('js/jquery.js') }}" defer></script>
</body>

</html>