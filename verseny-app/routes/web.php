<?php

use App\Http\Controllers\RoundController;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\CompetitorController;
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

Route::get('/', [CompetitionController::class, 'getCompetitions'])->name('home');
Route::get('/competition/{v_id}', [CompetitionController::class, 'getCompetition'])->name('competition');
Route::get('/round/{fordulo_id}', [RoundController::class, 'getRound'])->name('round');



