<?php

use App\Http\Controllers\EpisodesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SeasonsController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\Autenticador;
use App\Models\Serie;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|Route::controller(SeriesController::class)->group(function(){
    Route::get('/series', 'index')->name('serie.lista');
    Route::get('/series/criar', 'create')->name('serie.criar');
    Route::post('/series/salvar', 'store')->name('serie.salvar');

});

| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/series');
});


Route::middleware('autenticador')->group(function ()  {
    Route::resource('/series', SeriesController::class);

    Route::get('/series/{series}/seasons', [SeasonsController::class, 'index'])
        ->name('seasons.index');

    Route::get('/season/{season}/episodes', [EpisodesController::class, 'index'])
        ->name('episodes.index');
    Route::post('/season/{season}/episodes', [EpisodesController::class, 'update'])
        ->name('episodes.update');
});


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'entrar'])->name('login.entrar');
Route::get('/logout', [LoginController::class, 'destroy'])->name('logout');

Route::get('/register', [UsersController::class, 'create'])->name('users.create');
Route::post('/register', [UsersController::class, 'store'])->name('users.store');


