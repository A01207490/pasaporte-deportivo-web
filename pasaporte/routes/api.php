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

//Route::resource('users', UsersController::class);

Route::post('getSessions', function (Request $request) {
    $this->validate($request, [
        'token' => 'required'
    ]);
    $user = auth()->user();
    $sesions = Sesion::getSesions($user)->get();
    return response()->json([
        //'user' => $user,
        'sesions' => $sesions
    ]);
});

Route::group([
    'middleware' => 'api',

], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::get('me', 'AuthController@me');
    Route::post('getSessions', 'AuthController@getSessions');
    Route::get('getClasses', function () {
        $clases = Clase::getSesions()->get();
        return response()->json($clases);
    });
    Route::get('getAnuncios', function () {
        $anuncios = Anuncio::all();
        return response()->json($anuncios);
    });
});
