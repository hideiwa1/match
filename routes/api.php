<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

	Route::group(['middleware' => 'api'], function(){
		Route::get('/auth', 'Api\AuthController@index');
		Route::get('/project', 'Api\ProjectController@index');
		Route::get('/projectSearch', 'Api\ProjectController@search');
		
		Route::get('/like', 'Api\LikeController@index');
		Route::get('/liketoggle', 'Api\LikeController@toggle');
		
		Route::get('/profilePic', 'Api\ProfilePicController@index');
	});
 