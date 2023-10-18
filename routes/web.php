<?php

use App\Http\Controllers\SeriesController;
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



Route::resource('/series', SeriesController::class);


