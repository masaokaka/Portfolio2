<?php

Route::get('/', function () {
    return view('top');
});

Route::get('/check', function () {
    return view('check');
});

//ゲスト用ルーティング

//home
Route::get('home', 'HomeController@index')->name('home');

//login logout   
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

//register
Route::get('register', 'Auth\RegisterController@showRegisterForm')->name('register');
Route::post('register', 'Auth\RegisterController@register')->name('register');

//request
Route::post('request', 'HomeController@request')->name('request');



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
    
    //request
    Route::post('request', 'Admin\HomeController@request')->name('admin.request');

});

// admin認証が必要なページ
Route::middleware('auth:admin')->group(function () {
    Route::get('admin', 'AdminController@index');
});