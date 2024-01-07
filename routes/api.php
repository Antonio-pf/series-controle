<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\SeasonsController;
use App\Http\Controllers\API\SeriesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthController::class, 'login']);

//resource -> cria várias rotas para o mesmo controller
Route::apiResource('/series',  SeriesController::class);
Route::get('/series/{series}/seasons', [SeasonsController::class, 'seasons']);
Route::get('/series/{series}/episodes', [SeasonsController::class, 'episodes']);
