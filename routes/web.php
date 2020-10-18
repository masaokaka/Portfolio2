<?php

Route::get('/', function () {
    return view('top');
});

Route::get('/check', function () {
    return view('check');
});

//学生用ページ
//ログイン認証など
Auth::routes();
//ログイン後トップページ(面談リクエスト)
Route::get('home', 'User\HomeController@index')->name('home');
Route::post('home', 'User\HomeController@request');


//社員用ページ
Route::group(['prefix' => 'admin'], function(){
    //ログイン後トップページ
    Route::get('home', 'Admin\HomeController@index')->name('admin.home');
    Route::post('home', 'Admin\HomeController@request');

    //login logout   
    Route::get('login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Admin\Auth\LoginController@login');
    Route::post('logout', 'Admin\Auth\LoginController@logout')->name('admin.logout');
    
    //register
    Route::get('register', 'Admin\Auth\RegisterController@showRegisterForm')->name('admin.register');
    Route::post('register', 'Admin\Auth\RegisterController@register');
    
});

// admin認証が必要なページ
//Route::middleware('auth:admin')->group(function () {
//    Route::get('admin', 'AdminController@index');
//});