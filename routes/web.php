<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AssetsController;
use App\Http\Controllers\ChampionController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SummonerEmoteController;
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
Route::get('/icon/{summonerIcon}', [
    SummonerIconController::class,
    'show'
])->name('assets.icons.show');

// Emotes
Route::get('/emotes', [
    SummonerEmoteController::class,
    'index'
])->name('assets.emotes.index');

// Assets
Route::get('/assets', [
    AssetsController::class,
    'index'
])->name('assets.index');

// Sales
Route::get('/sale-rotation', [SaleController::class, 'index'])->name('sales.index');

// About
Route::get('/about', [
    AboutController::class,
    'index'
])->name('about.index');

// About.FAQController
Route::get('/about/faq/league-of-legends', [
    FAQController::class,
    'leagueoflegends'
])->name('about.faq.leagueoflegends');

Route::get('/about/faq/heimerdinger', [
    FAQController::class,
    'heimerdinger'
])->name('about.faq.heimerdinger');

// Pulse
Route::get(config('app.login_route'), function () {
    return redirect('/pulse');
})->name('login')->middleware('auth.basic');
