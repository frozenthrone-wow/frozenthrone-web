<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DownloadsController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\StatsController;
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

// #region Authentication
Route::post('register', [AuthenticationController::class, 'register'])->name('register');
// #endregion

// #region NEWS API
Route::get('news', [NewsController::class, 'getNews'])->name('getNews');
Route::get('news/{id}', [NewsController::class, 'getSpecificNews'])->name('getSpecificNews');
// #endregion

// #region DOWNLOADS API
Route::get('downloads/{id?}', [DownloadsController::class, 'getDownloads'])->name('getDownloads');
// #endregion

// #region STATS API
Route::get('stats/online', [StatsController::class, 'getOnlinePlayerCount'])->name('getOnlinePlayerCount');
Route::get('stats/ranking', [StatsController::class, 'getPlayerRanking'])->name('getPlayerRanking');
Route::get('stats/stats', [StatsController::class, 'getServerStatistics'])->name('getServerStatistics');
// #endregion
