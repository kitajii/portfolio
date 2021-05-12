@extends('layouts.admin.layout')

@section('title')
{{ $admin->name }}のページ
@endsection('title')

@section('main')
    <div class="main container">
        <div class="p-3 my-2 mx-3 bg-white shadow-sm rounded">
            <div class="my-4">
                <p class="h5 my-3">{{ $admin->name }}</p>
            </div>
            <div class="d-flex justify-content-around">
                <a class="btn btn-outline-danger btn-sm px-3" href="{{ route('admin_logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a>
                <form id="logout-form" action="{{ route('admin_logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>
@endsection('main')