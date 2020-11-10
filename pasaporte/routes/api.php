<?php

use App\Anuncio;
use App\Clase;
use App\Sesion;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

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

/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  \App\User  $user
 * @return \Illuminate\Http\Response
 */

Route::group([
    'middleware' => 'api',

], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::get('me', 'AuthController@me');
    Route::get('getSession', 'AuthController@getSession');
    Route::post('createSession', 'AuthController@createSession');
    Route::get('getAnnouncement', function () {
        $anuncios = Anuncio::all();
        return response()->json($anuncios, 200);
    });
    Route::get('getClass', function () {
        return $clases = Clase::getClass();
        $clases = response()->json($clases, 200);
    });
    Route::get('getClassCurrent', function () {
        $clases = Clase::getClassCurrent();
        return response()->json($clases, 200);
    });
});
