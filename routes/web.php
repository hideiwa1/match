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
if(config('app.env') === 'production'){
	URL::forceScheme('https');
}
//Route::get('/', function () {});
  Route::get('project', 'ProjectController@project');

	Route::get('detail/{id}', 'ProjectController@detail');

  Route::get('', 'IndexController@index');

Route::get('profile/{id}', 'UserController@profile');


Auth::routes();
Route::get('login', 'LoginController@getAuth') -> name('login');
Route::post('login', 'LoginController@postAuth');
Route::get('signup', 'UserController@signup');
Route::post('signup', 'UserController@postSignup');

Route::get('pass/reset/{token?}', 'Auth\ForgotPasswordController@showLinkRequestForm');

Route::group(['middleware' => 'auth'], function(){
	Route::get('logout', 'Auth\LoginController@logout');
	
	Route::get('mypage', 'MyPageController@index')->name('mypage');
	
	Route::get('myProject', 'MyPageController@myProject');

	Route::get('myComment', 'MyPageController@myComment');

	Route::get('myLike', 'MyPageController@index');

	Route::get('myMessage', 'MyPageController@myMessage');
	
	Route::post('detail/{id}', 'DetailController@add');
	
	Route::get('registProject/{id?}', 'ProjectController@regist')->name('registProject');
	Route::post('registProject/{id?}', 'ProjectController@save');
	
	Route::get('editProfile', 'UserController@edit');
	Route::post('editProfile', 'UserController@add');
	
	Route::get('messageCheck/{id?}', 'MessageController@check');
	Route::get('message/{id?}', 'MessageController@index')->name('message');
	Route::post('message/{id?}', 'MessageController@add');
});

//Route::get('api/auth', 'Api\AuthController@index');