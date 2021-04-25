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

Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware'=>'auth'], function() {
    Route::get('map','ArticleController@map');
    Route::get('article/create','ArticleController@add');
    Route::post('article/list','ArticleController@create');
    Route::get('article/list','ArticleController@list');
    Route::get('article/list','ArticleController@search');
    Route::get('article','ArticleController@detail');
    Route::get('article/edit','ArticleController@edit');
    Route::post('article','ArticleController@update');
    Route::get('article/list','ArticleController@delete');
    Route::get('article/point','ArticleController@point');

    Route::get('profile','ProfileController@detail');
    Route::get('profile/edit','ProfileController@edit');
    Route::post('profile','ProfileController@update');
    });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
