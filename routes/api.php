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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


// Route::group(['prefix' => 'auth'], function () {
// });
Route::post('/login', 'AuthController@login');



Route::post('/user', 'UserController@store');
Route::get('/getUser','UserController@index');
Route::get('/showUser/{user_id}','UserController@show');



Route::post('/questionStore','QuestionController@store');
Route::get('/getQuestion','QuestionController@getQuestion');


Route::post('/commentStore','CommentController@store');
Route::get('/getAllComment','CommentController@getComment');
Route::get('/getComment/{question_id}','CommentController@getComment');



