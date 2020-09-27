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

Route::view('/', "inicio");

Route::get("/coaches", "CoachController@index")->name('coaches.index');
Route::get("/coaches/{coach}/destroy", "CoachController@destroy")->name('coaches.destroy');
Route::post("/coaches", "CoachController@store")->name('coaches.store');
Route::get("/coaches/create", "CoachController@create")->name('coaches.create');
Route::get("/coaches/{coach}", "CoachController@show")->name('coaches.show');
Route::get("/coaches/{coach}/edit", "CoachController@edit")->name('coaches.edit');
Route::put("/coaches/{coach}", "CoachController@update")->name('coaches.update');

Route::get("/clases", "ClaseController@index")->name('clases.index');
Route::get("/clases/{clase}/destroy", "ClaseController@destroy")->name('clases.destroy');
Route::post("/clases", "ClaseController@store")->name('clases.store');
Route::get("/clases/create", "ClaseController@create")->name('clases.create');
Route::get("/clases/{clase}", "ClaseController@show")->name('clases.show');
Route::get("/clases/{clase}/edit", "ClaseController@edit")->name('clases.edit');
Route::put("/clases/{clase}", "ClaseController@update")->name('clases.update');

Route::get("/anuncios", "AnuncioController@index")->name('anuncios.index');
Route::get("/anuncios/{anuncio}/destroy", "AnuncioController@destroy")->name('anuncios.destroy');
Route::post("/anuncios", "AnuncioController@store")->name('anuncios.store');
Route::get("/anuncios/create", "AnuncioController@create")->name('anuncios.create');
Route::get("/anuncios/{anuncio}", "AnuncioController@show")->name('anuncios.show');
Route::get("/anuncios/{anuncio}/edit", "AnuncioController@edit")->name('anuncios.edit');
Route::put("/anuncios/{anuncio}", "AnuncioController@update")->name('anuncios.update');

Route::get("/users", "UsersController@index")->name('users.index');
Route::get("/users/{user}/destroy", "UsersController@destroy")->name('users.destroy');
Route::post("/users", "UsersController@store")->name('users.store');
Route::get("/users/create", "UsersController@create")->name('users.create');
Route::get("/users/{user}", "UsersController@show")->name('users.show');
Route::get("/users/{user}/edit", "UsersController@edit")->name('users.edit');
Route::put("/users/{user}", "UsersController@update")->name('users.update');


Route::get("/sesions", "SesionController@index")->name('sesions.index');
Route::get("/sesions/{user}", "SesionController@show")->name('sesions.show');
