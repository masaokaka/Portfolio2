<?php
//---------------------------------------------------------------------------------------------------------
Auth::routes();

//認証不要
Route::get('/', function () { return view('top'); });
Route::get('/check', function () { return view('check'); });


//User　認証後
Route::group(['middleware' => 'auth:user'], function(){
    Route::get('home', 'User\HomeController@index')->name('home');
    Route::post('home', 'User\HomeController@request');
});


//---------------------------------------------------------------------------------------------------------
//Admin　認証不要
Route::prefix('admin')->name('admin.')->group(function() {
        Route::get('login', 'Admin\Auth\LoginController@showLoginForm')->name('login');
        Route::post('login', 'Admin\Auth\LoginController@login');
        Route::get('register', 'Admin\Auth\RegisterController@showRegisterForm')->name('register');
        Route::post('register', 'Admin\Auth\RegisterController@register');
        Route::get('password/reset', 'Admin\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('password/email', 'Admin\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        Route::get('password/reset/{token}', 'Admin\Auth\ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('password/reset', 'Admin\Auth\ResetPasswordController@reset');

});

//Admin 認証後
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
    Route::get('home', 'Admin\HomeController@index')->name('admin.home');
    Route::post('home', 'Admin\HomeController@request')->name('admin.home');
    Route::post('evaluation', 'Admin\HomeController@evaluation')->name('admin.evaluation');
    Route::post('logout', 'Admin\Auth\LoginController@logout')->name('admin.logout');  
});


//---------------------------------------------------------------------------------------------------------
//Jinji 認証不要
Route::prefix('jinji')->name('jinji.')->group(function() {
    Route::get('login', 'Jinji\Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Jinji\Auth\LoginController@login');
    Route::get('register', 'Jinji\Auth\RegisterController@showRegisterForm')->name('register');
    Route::post('register', 'Jinji\Auth\RegisterController@register');
    Route::get('password/reset', 'Jinji\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Jinji\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Jinji\Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Jinji\Auth\ResetPasswordController@reset');
});

//Jinji 認証後
Route::group(['prefix' => 'jinji', 'middleware' => 'auth:jinji'], function() {
    Route::get('home', 'Jinji\HomeController@index')->name('jinji.home');
    Route::post('match', 'Jinji\HomeController@match')->name('jinji.match');
    Route::post('match_complete', 'Jinji\HomeController@match_complete')->name('jinji.match_complete');
    Route::post('logout', 'Jinji\Auth\LoginController@logout')->name('jinji.logout');  
});