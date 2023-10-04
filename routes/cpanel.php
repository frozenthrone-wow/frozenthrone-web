<?php

use App\Classes\Cpanel\Cpanel;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CpanelController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [CpanelController::class, 'home'])->name('cpanelHome');

Route::get('/news', [CpanelController::class, 'news'])->name('cpanelNews');
Route::post('/news', [CpanelController::class, 'postNews'])->name('cpanelNewsPost');
Route::delete('/news/{id}', [CpanelController::class, 'removeNews'])->name('cpanelNewsRemove');

Route::get('/downloads', [CpanelController::class, 'downloads'])->name('cpanelDownloads');
Route::post('/downloads', [CpanelController::class, 'postDownloads'])->name('cpanelDownloadsPost');
Route::delete('/downloads/{id}', [CpanelController::class, 'removeDownloads'])->name('cpanelDownloadsRemove');

Route::get('authenticate', [CpanelController::class, 'authenticate'])->name('cpanelAuthenticate');


