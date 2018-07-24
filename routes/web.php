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
Route::get('/',"TasklistController@index");

Route::resource('tasklist', 'TasklistController');

Auth::routes();
//vendor/laravel/framework/src/Illuminate/Routing/Router.phpに接続

Route::get('/home', 'HomeController@index')->name('home');

//ユーザー登録
//Illuminate\Foundation\Auth\RegistersUsersに中身はある
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@')->name('signup.post');


Route::group(['middleware' => ['auth']], function () {
    Route::resource('users', 'UsersController', ['only' => ['index', 'show']]);
});