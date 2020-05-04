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

Route::apiResource('vacancy','VacancyController');
Route::post('subscribe','VacancyController@subscribe');
Route::apiResource('users','UserController');
Route::apiResource('category','CategoryController');
Route::apiResource('location','LocationController');
Route::apiResource('job-type','JobTypeController');
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function () {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});
