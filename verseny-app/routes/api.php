<?php

use App\Http\Controllers\RoundController;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\CompetitorController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/add-competition', [CompetitionController::class, 'insert'])->name('add-competition');
Route::post('/add-round', [RoundController::class, 'insert'])->name('add-round');
Route::post('/add-competitor', [CompetitorController::class, 'insert'])->name('add-competitor');
Route::post('/delete-competitor', [CompetitorController::class, 'delete'])->name('delete-competitor');
