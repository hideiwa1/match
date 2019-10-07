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

//Route::get('/', function () {});
  Route::get('product', 'ProductController@product');
  Route::get('', function(){return view('index');});
  Route::get('myComment', function(){return view('myComment');});


Auth::routes();
Route::get('login', 'loginController@getAuth') -> name('login');
Route::post('login', 'loginController@postAuth');
Route::get('signup', 'signupController@index');
Route::post('signup', 'signupController@postSignup');

Route::get('pass/reset/{token?}', 'Auth\ForgotPasswordController@showLinkRequestForm');

Route::group(['middleware' => 'auth'], function(){
    Route::get('mypage', 'mypageController@index');
});

//Route::get('api/auth', 'Api\AuthController@index');