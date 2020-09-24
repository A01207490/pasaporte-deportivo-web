<?php

use Illuminate\Support\Facades\Route;

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

Route::get("/", "CoachController@index");
Route::get("/coaches", "CoachController@index")->name('coaches.index');
Route::get("/coaches/{coach}/destroy", "CoachController@destroy")->name('coaches.destroy');
Route::post("/coaches", "CoachController@store");
Route::get("/coaches/create", "CoachController@create");
Route::get("/coaches/{coach}", "CoachController@show")->name('coaches.show');
Route::get("/coaches/{coach}/edit", "CoachController@edit");
Route::put("/coaches/{coach}", "CoachController@update");

Route::get("/clases", "ClaseController@index")->name('clases.index');
Route::get("/clases/{clase}/destroy", "ClaseController@destroy")->name('clases.destroy');
Route::post("/clases", "ClaseController@store");
Route::get("/clases/create", "ClaseController@create");
Route::get("/clases/{clase}", "ClaseController@show")->name('clases.show');
Route::get("/clases/{clase}/edit", "ClaseController@edit");
Route::put("/clases/{clase}", "ClaseController@update");
