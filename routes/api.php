<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('message','api\testController@message');


Route::apiResource('Student','api\studentController');
/*
    /Users (get) 
    /Users/create (get)
    /Users (post)
    /Users/{id}/edit (get)
    /Users/{id}  (put)
    /Users/{id}  (get)
    /Users/{id}  (delete)
*/

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'api\AuthController@login');
    Route::post('logout', 'api\AuthController@logout');
    Route::post('refresh', 'api\AuthController@refresh');
    Route::post('me', 'api\AuthController@me');

});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
