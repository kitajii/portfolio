<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <title>釣果入力</title>
</head>

<body class="text-center bg-light text-secondary">
    <!-- header -->
    <header class="fixed-top p-2 bg-primary text-white">
        <p class="d-flex align-items-center justify-content-center h5 font-weight-bold my-2">釣果入力</p>
    </header>
    <!-- main -->
    <div class="main container">
        <form>
            <div class="form-group p-3 my-2 bg-white shadow-sm rounded">
                <p class="h5 mb-2 font-weight-bold">天気</p>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                        value="option1">
                    <label class="form-check-label" for="inlineRadio1"><i
                            class="fas fa-sun fa-lg text-warning"></i></label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                        value="option2">
                    <label class="form-check-label" for="inlineRadio2"><i
                            class="fas fa-cloud fa-lg text-secondary"></i></label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3"
                        value="option3">
                    <label class="form-check-label" for="inlineRadio3"><i
                            class="fas fa-umbrella fa-lg text-primary"></i></label>
                </div>
            </div>
            <div class="form-group p-3 my-2 bg-white shadow-sm rounded">
                <p class="h5 mb-2 font-weight-bold">サイズ</p>
                <div class="form-inline justify-content-center">
                    <input type="text" id="inputSize" class="form-control form-control-sm" style="width:50px"
                        required>&nbsp;<span>㎝</span>
                </div>
            </div>
            <div class="form-group p-3 my-2 bg-white shadow-sm rounded">
                <p class="h5 mb-2 font-weight-bold">写真</p>
                <button type="button" class="btn btn-outline-primary btn-sm">写真を選択</button>
            </div>
            <div class="form-group p-3 my-2 bg-white shadow-sm rounded">
                <p class="h5 mb-2 font-weight-bold">コメント</p>
                <textarea class="form-control" style="resize:none" name="comment" id="comment" rows="3"></textarea>
            </div>
            <button class="btn btn-primary btn-block font-weight-bold my-3 mx-auto" style="width: 200px;"
                type="submit">投稿する</button>
        </form>
    </div>
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
</body>

</html>