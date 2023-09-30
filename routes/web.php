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
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login')->name('login'); // 表示用
Route::post('/login', 'Auth\LoginController@login'); // ボタンを押したとき用

Route::get('/register', 'Auth\RegisterController@register'); // 表示用
Route::post('/register', 'Auth\RegisterController@register'); // ボタンを押したとき用

Route::get('/added', 'Auth\RegisterController@added'); // 表示用
Route::post('/added', 'Auth\RegisterController@added'); // ボタンを押したとき用

//ログイン中のページ

Route::get('/top','PostsController@index')->middleware('auth'); // 表示用
// Route::post('/top','PostsController@index'); // ボタンを押したとき用

Route::get('/profile','UsersController@profile')->middleware('auth');

Route::get('/search','UsersController@search')->middleware('auth');

Route::get('/follow-list','PostsController@followList')->middleware('auth');
Route::get('/follower-list','PostsController@followerList')->middleware('auth');

Route::get('/logout', 'Auth\LoginController@logout');

// 投稿用
Route::post('/post/create', 'PostsController@postsCreate');
