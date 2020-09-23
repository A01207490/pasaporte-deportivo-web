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

Route::get("/coaches", "CoachController@index");
Route::post("/coaches", "CoachController@store");
Route::get("/coaches/create", "CoachController@create");
Route::get("/coaches/{coach}/edit", "CoachController@create");
