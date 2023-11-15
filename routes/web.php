<?php

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
Route::get('/champions', [ChampionController::class, 'index']);
Route::get('/champion/{champion}', [ChampionController::class, 'show']);
// Skins
Route::get('/skins', [ChampionSkinController::class, 'index'])->name('skins.index');
Route::get(
    '/skin/{championSkin}',
    [ChampionSkinController::class, 'show']
);

// Icons
Route::get('/icons', [
    SummonerIconController::class,
    'index'
])->name('icons.index');
