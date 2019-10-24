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

	Route::get('detail/{id}', 'DetailController@index');

  Route::get('', function(){return view('index');});


Auth::routes();
Route::get('login', 'LoginController@getAuth') -> name('login');
Route::post('login', 'LoginController@postAuth');
Route::get('signup', 'SignupController@index');
Route::post('signup', 'SignupController@postSignup');

Route::get('pass/reset/{token?}', 'Auth\ForgotPasswordController@showLinkRequestForm');

Route::group(['middleware' => 'auth'], function(){
	Route::get('mypage', 'mypageController@index');
	Route::post('detail/{id}', 'DetailController@add');
	
	Route::get('registProject/{id?}', 'RegistProjectController@regist');
	Route::post('registProject/{id?}', 'RegistProjectController@save');
	
	Route::get('myProject', 'MyProjectController@index');
	
	Route::get('myComment', 'MyCommentController@index');
	
	Route::get('myLike', 'MyLikeController@index');
	
	Route::get('myMessage', 'MyMessageController@index');
	
	Route::get('editProfile', 'EditProfileController@index');
	Route::post('editProfile', 'EditProfileController@add');
	
	Route::get('messageCheck/{id?}', 'MessageController@check');
	Route::get('message/{id?}', 'MessageController@index')->name('message');
	Route::post('message/{id?}', 'MessageController@add');
});

//Route::get('api/auth', 'Api\AuthController@index');