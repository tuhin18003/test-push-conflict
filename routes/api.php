<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::post('register','UserController@register');
// Route::post('login','UserController@login');
// Route::post('login', [ UserController::class, 'login'] );
// Route::post('register', [ UserController::class, 'register'] );
// Route::get('profile','UserController@getAuthenticatedUser');

Route::group([

    'middleware' => 'api',
    'namespace' => 'App\Http\Controllers',
    'prefix' => 'auth'

], function ($router) {

    // Route::post('login', [ UserController::class, 'login'] );
    // Route::post('register', [ UserController::class, 'register'] );
    Route::post('register', [ UserController::class, 'register'] );
    Route::post('login', [ UserController::class, 'login'] );
    Route::post('logout', [ UserController::class, 'register'] );
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});


Route::middleware('auth:api')->get('/user', function(Request $request){
    return $request->user();
});

