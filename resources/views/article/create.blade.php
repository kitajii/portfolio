@extends('layouts.layout')

@section('title','釣果入力')

@section('main')
    <div class="main container">
        <p>{{ $latlng['lat'] }}</p>
        <p>{{ $latlng['lng'] }}</p>
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
@endsection('main')