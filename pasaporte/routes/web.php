<?php

use App\Role;
use App\User;
use App\Exports\SesionsExport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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
//Rutas para eliminar todos los coaches
Route::get("/coaches/destroyAll", "CoachController@destroyAll")->name('coaches.destroyAll')->middleware(['auth', 'auth.admin']);
Route::get("/coaches/confirmDestroyAll", "CoachController@confirmDestroyAll")->name('coaches.confirmDestroyAll')->middleware(['auth', 'auth.admin']);
//Rutas para eliminar todos los anuncios
Route::get("/anuncios/destroyAll", "AnuncioController@destroyAll")->name('anuncios.destroyAll')->middleware(['auth', 'auth.admin']);
Route::get("/anuncios/confirmDestroyAll", "AnuncioController@confirmDestroyAll")->name('anuncios.confirmDestroyAll')->middleware(['auth', 'auth.admin']);

Route::get("/clases/destroyAll", "ClaseController@destroyAll")->name('clases.destroyAll')->middleware(['auth', 'auth.admin']);
Route::get("/clases/confirmDestroyAll", "ClaseController@confirmDestroyAll")->name('clases.confirmDestroyAll')->middleware(['auth', 'auth.admin']);

Route::get("/sesions/destroyAll", "SesionController@destroyAll")->name('sesions.destroyAll')->middleware(['auth', 'auth.admin']);
Route::get("/sesions/confirmDestroyAll", "SesionController@confirmDestroyAll")->name('sesions.confirmDestroyAll')->middleware(['auth', 'auth.admin']);

Route::get('sesions/create/{user}', [
    'as' => 'sesions.create',
    'uses' => 'SesionController@create'
]);

Route::post('sesions/store/{user}', [
    'as' => 'sesions.store',
    'uses' => 'SesionController@store'
]);

Route::get("/users/export", "UsersController@export")->name('users.export')->middleware(['auth', 'auth.admin']);
Route::get("/pasaportes/export", "SesionController@export")->name('pasaportes.export')->middleware(['auth', 'auth.admin']);
Route::get("/clases/export", "ClaseController@export")->name('clases.export')->middleware(['auth', 'auth.admin']);
Route::get("/coaches/export", "CoachController@export")->name('coaches.export')->middleware(['auth', 'auth.admin']);
Route::get("/anuncios/export", "AnuncioController@export")->name('anuncios.export')->middleware(['auth', 'auth.admin']);
Route::get("/qr/{coach}/download", "CoachController@download")->name('qr.download')->middleware(['auth', 'auth.admin']);

Route::resource("/anuncios", "AnuncioController")->middleware(['auth', 'auth.admin']);
Route::resource("/coaches", "CoachController")->middleware(['auth', 'auth.admin']);
Route::resource("/clases", "ClaseController")->middleware(['auth', 'auth.admin']);
Route::resource("/users", "UsersController")->middleware(['auth', 'auth.admin']);
Route::resource("/sesions", "SesionController", ['except' => ['update', 'edit', 'create', 'store']])->middleware(['auth', 'auth.admin']);

Route::delete("/anuncios/{anuncio}/confirm", "AnuncioController@confirm")->name('anuncios.confirm')->middleware(['auth', 'auth.admin']);
Route::delete("/clases/{clase}/confirm", "ClaseController@confirm")->name('clases.confirm')->middleware(['auth', 'auth.admin']);
Route::delete("/coaches/{coach}/confirm", "CoachController@confirm")->name('coaches.confirm')->middleware(['auth', 'auth.admin']);
Route::delete("/cs/{user}/confirm", "UsersController@confirm")->name('users.confirm')->middleware(['auth', 'auth.admin']);
Route::delete("/sesions/{sesion}/confirm", "SesionController@confirm")->name('sesions.confirm')->middleware(['auth', 'auth.admin']);




Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/migrate', function () {
    Artisan::call('migrate:fresh --seed');
    return Artisan::output();
});

Route::get('/status', function () {
    Artisan::call('migrate:status');
    return Artisan::output();
});

Route::get('/crear_administrador', function () {
    include $_SERVER['DOCUMENT_ROOT'] . '/crear_administrador.php';
});
