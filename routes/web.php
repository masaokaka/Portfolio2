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

use App\Http\Controllers\SampleController;

use function App\Http\Controllers\message_sample;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sample_action', 'SampleController@sample_action');

Route::get('/blade_sample', function () {
    $title = 'bladeテンプレートのサンプルです';
    $description = 'bladeテンプレートを利用すると、HTML内にPHPの変数を埋め込むことができます。';
    return view('blade_sample',[
        'title' => $title,
        'description' => $description,
    ]);
});

Route::get('/message_sample', 'SampleController@message_sample');

Route::get('/message_practice', 'SampleController@message_practice');

Route::get('/blade_example','SampleController@blade_example');

/*簡易メッセージアプリ用ルーティング*/

Route::get('/messages','MessagesController@index');
Route::post('/messages', 'MessagesController@create');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('admin')->name('admin::')->group(function() {
    // ログインフォーム
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    // ログイン処理
    Route::post('login', 'Auth\LoginController@login');
    //ログアウト処理
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');
});

// admin認証が必要なページ
Route::middleware('auth:admin')->group(function () {
    Route::get('admin', 'AdminController@index');
});
