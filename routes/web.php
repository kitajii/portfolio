<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::group(['middleware'=>'auth'], function() {
    Route::get('/','ArticleController@map');
    Route::post('article/create','ArticleController@add');
    Route::post('article/list','ArticleController@create');
    Route::get('article/list','ArticleController@list');
    Route::get('article','ArticleController@detail')->name('article_detail');
    Route::get('article/edit','ArticleController@edit');
    Route::patch('article','ArticleController@update');
    Route::delete('article/list','ArticleController@delete');
    Route::get('article/point','ArticleController@point');

    Route::get('profile','ProfileController@detail')->name('profile_detail');
    Route::get('profile/edit','ProfileController@edit');
    Route::patch('profile','ProfileController@update');
    });

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');


// 管理者画面
Route::group(['prefix' => 'admin', 'middleware'=>'auth:admin'], function(){
    
    Route::get('/','Admin\ArticleController@map');
    Route::get('article/list','Admin\ArticleController@list');
    Route::get('article','Admin\ArticleController@detail')->name('admin_article_detail');
    Route::get('article/edit','Admin\ArticleController@edit');
    Route::patch('article','Admin\ArticleController@update');
    Route::delete('article/list','Admin\ArticleController@delete');
    Route::get('article/point','Admin\ArticleController@point');

    Route::get('mypage','Admin\ProfileController@mypage');
    Route::get('profile','Admin\ProfileController@detail')->name('admin_profile_detail');
    Route::get('profile/edit','Admin\ProfileController@edit');
    Route::patch('profile','Admin\ProfileController@update');
    
    // AdminHome
    // Route::get('home', 'Admin\HomeController@index')->name('admin_home');
    //login&logout
});

    Route::get('admin/login', 'Admin\LoginController@showLoginForm')->name('admin_login');
    Route::post('admin/login', 'Admin\LoginController@login')->name('admin_login');
    Route::post('admin/logout', 'Admin\LoginController@logout')->name('admin_logout');
