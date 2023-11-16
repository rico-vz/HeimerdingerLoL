<?php

use App\Http\Controllers\AssetsController;
use App\Http\Controllers\ChampionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ChampionSkinController;
use App\Http\Controllers\SummonerIconController;

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

Route::get('/', [HomeController::class, 'index']);

// Champions
Route::get('/champions', [ChampionController::class, 'index'])->name('champions.index');
Route::get('/champion/{champion}', [ChampionController::class, 'show'])->name('champions.show');
// Skins
Route::get('/skins', [ChampionSkinController::class, 'index'])->name('skins.index');
Route::get(
    '/skin/{championSkin}',
    [ChampionSkinController::class, 'show']
)->name('skins.show');

// Icons
Route::get('/icons', [
    SummonerIconController::class,
    'index'
])->name('assets.icons.index');

// Assets
Route::get('/assets', [
    AssetsController::class,
    'index'
])->name('assets.index');
