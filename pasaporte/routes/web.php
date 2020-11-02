<?php

use App\Exports\SesionsExport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
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

Route::get("/users/destroyAll", "UsersController@destroyAll")->name('users.destroyAll')->middleware(['auth', 'auth.admin']);
Route::get("/users/confirmDestroyAll", "UsersController@confirmDestroyAll")->name('users.confirmDestroyAll')->middleware(['auth', 'auth.admin']);


Route::get('sesions/create/{user}', [
    'as' => 'sesions.create',
    'uses' => 'SesionController@create'
]);

Route::post('sesions/store/{user}', [
    'as' => 'sesions.store',
    'uses' => 'SesionController@store'
]);


Route::resource("/anuncios", "AnuncioController")->middleware(['auth', 'auth.admin']);
Route::resource("/coaches", "CoachController")->middleware(['auth', 'auth.admin']);
Route::resource("/clases", "ClaseController")->middleware(['auth', 'auth.admin']);
Route::resource("/users", "UsersController")->middleware(['auth', 'auth.admin']);
Route::resource("/sesions", "SesionController", ['except' => ['update', 'edit', 'create', 'store']])->middleware(['auth', 'auth.admin']);

Route::get("/pasaportes/export", "SesionController@export")->name('pasaportes.export')->middleware(['auth', 'auth.admin']);
Route::get("/qr/{coach}/download", "CoachController@download")->name('qr.download')->middleware(['auth', 'auth.admin']);

Route::get("/anuncios/{anuncio}/confirm", "AnuncioController@confirm")->name('anuncios.confirm')->middleware(['auth', 'auth.admin']);
Route::get("/clases/{clase}/confirm", "ClaseController@confirm")->name('clases.confirm')->middleware(['auth', 'auth.admin']);
Route::get("/coaches/{coach}/confirm", "CoachController@confirm")->name('coaches.confirm')->middleware(['auth', 'auth.admin']);
Route::delete("/cs/{user}/confirm", "UsersController@confirm")->name('users.confirm')->middleware(['auth', 'auth.admin']);
Route::get("/sesions/{sesion}/confirm", "SesionController@confirm")->name('sesions.confirm')->middleware(['auth', 'auth.admin']);




Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
