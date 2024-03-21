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

// 自分のプロフィール画面へ
Route::get('/myprofile','UsersController@myProfile')->middleware('auth');
// 各ユーザーのプロフィール画面へ
Route::get('/profile/{id}','UsersController@profile')->middleware('auth');

// 検索ページ
Route::get('/search','UsersController@search')->middleware('auth');
Route::post('/search','UsersController@search');

// ログアウト
Route::get('/logout', 'Auth\LoginController@logout');

// 投稿登録
Route::post('/post/create', 'PostsController@postsCreate');

// 投稿編集
Route::post('/post/update','PostsController@update');

// 投稿削除
Route::get('/post/{id}/delete','PostsController@delete');

// フォロー機能
Route::group(['middleware' => 'auth'], function () {
    Route::get('/follow/{userId}','FollowsController@follow')->name('follow');
    Route::post('/follow/{userId}','FollowsController@follow');
    Route::get('/cancel/{userId}','FollowsController@cancel')->name('cancel');
    Route::post('/cancel/{userId}','FollowsController@cancel');
});

//　フォローリストページ
Route::get('/follow-list','FollowsController@followList');

// フォロワーリストページ
Route::get('/follower-list','FollowsController@followerList');
