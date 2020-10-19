<?php

use App\Anuncio;
use App\Clase;
use App\Sesion;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
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
    Route::post('getSessions', 'AuthController@getSessions');
    Route::post('registerSession', 'AuthController@registerSession');
    Route::get('getAnuncios', function () {
        $anuncios = Anuncio::all();
        return response()->json($anuncios, 200);
    });
    Route::get('getCurrentClasses', function () {
        $clases = Clase::getCurrentClasses();
        return response()->json($clases, 200);
    });
});
