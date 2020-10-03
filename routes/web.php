<?php

use App\Http\Controllers\SampleController;

use function App\Http\Controllers\message_sample;

Route::get('/', function () {
    return view('welcome');
});

/*簡易メッセージアプリ用ルーティング*/

Route::get('/messages','MessagesController@index');
Route::post('/messages', 'MessagesController@create');

// admin用ルーティング

Auth::routes();

Route::group(['prefix' => 'admin'], function(){
    //home
    Route::get('home', 'Admin\HomeController@index')->name('admin.home');
    //login logout   
    Route::get('login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Admin\Auth\LoginController@login')->name('admin.login');
    Route::post('logout', 'Admin\Auth\LoginController@logout')->name('admin.logout');
    //register
    Route::get('register', 'Admin\Auth\RegisterController@showRegisterForm')->name('admin.register');
    Route::post('register', 'Admin\Auth\RegisterController@register')->name('admin.register');

});

// admin認証が必要なページ
Route::middleware('auth:admin')->group(function () {
    Route::get('admin', 'AdminController@index');
});


Route::get('/home', 'Admin\HomeController@index')->name('home');
