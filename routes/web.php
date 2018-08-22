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

Route::group(['middleware' => 'auth:web'], function(){
    //主页
    Route::get('/', "\App\Http\Controllers\Home\HomeController@index");
    //投票
    Route::get('/posts/{post}/vote', '\App\Http\Controllers\Home\HomeController@vote');

    //参赛
    Route::get('/posts','\App\Http\Controllers\Home\PostController@index');
        //作品添加
        Route::get('/posts/add','\App\Http\Controllers\Home\PostController@add');
        Route::post('/posts/store','\App\Http\Controllers\Home\PostController@store');

    //排名
    Route::get('/rankings','\App\Http\Controllers\Home\RankingController@index');

    //我的
    Route::get('/mine','\App\Http\Controllers\Home\MineController@index');
});

Route::get('/login', "\App\Http\Controllers\Home\LoginController@index")->name('login');
Route::post('/login', "\App\Http\Controllers\Home\LoginController@login");
Route::get('/logout', "\App\Http\Controllers\Home\LoginController@logout");

Route::get('/register', "\App\Http\Controllers\Home\RegisterController@index");
Route::post('/register', "\App\Http\Controllers\Home\RegisterController@register");

include_once("admin.php");
