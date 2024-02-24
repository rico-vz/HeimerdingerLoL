<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AssetsController;
use App\Http\Controllers\ChampionController;
use App\Http\Controllers\ChampionSkinController;
use App\Http\Controllers\ContactSubmissionController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SummonerEmoteController;
use App\Http\Controllers\SummonerIconController;
use App\Http\Requests\ContactSubmissionRequest;
use App\Models\Champion;
use App\Models\SummonerIcon;
use Illuminate\Support\Facades\Route;
use Spatie\Sheets\Sheet;
use Spatie\Honeypot\ProtectAgainstSpam;


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

Route::get('/', static fn () => (new HomeController())->index());

// Champions
Route::get('/champions', static fn () => (new ChampionController())->index())->name('champions.index');
Route::get('/champion/{champion}', static fn (Champion $champion) => (new ChampionController())->show($champion))->name('champions.show');
// Skins
Route::get('/skins', static fn () => (new ChampionSkinController())->index())->name('skins.index');
Route::get(
    '/skin/{championSkin}',
    static fn (\App\Models\ChampionSkin $championSkin) => (new ChampionSkinController())->show($championSkin)
)->name('skins.show');

// Icons
Route::get('/icons', static fn () => (new SummonerIconController())->index())->name('assets.icons.index');
Route::get('/icon/{summonerIcon}', static fn (SummonerIcon $summonerIcon) => (new SummonerIconController())->show($summonerIcon))->name('assets.icons.show');

// Emotes
Route::get('/emotes', static fn () => (new SummonerEmoteController())->index())->name('assets.emotes.index');

// Assets
Route::get('/assets', static fn () => (new AssetsController())->index())->name('assets.index');

// Sales
Route::get('/sale-rotation', static fn () => (new SaleController())->index())->name('sales.index');

// About
Route::get('/about', static fn () => (new AboutController())->index())->name('about.index');

// About.FAQController
Route::get('/about/faq/league-of-legends', static fn () => (new FAQController())->leagueoflegends())->name('about.faq.leagueoflegends');

Route::get('/about/faq/heimerdinger', static fn () => (new FAQController())->heimerdinger())->name('about.faq.heimerdinger');

// Posts
Route::get('/posts', static fn () => (new PostsController())->index())->name('posts.index');

Route::get('/post/{post}', static fn (Sheet $post) => (new PostsController())->show($post))->name('posts.show');

// Contact
Route::get('/contact', static fn () => (new ContactSubmissionController())->index())->name('contact.index');
Route::post('/contact', function (ContactSubmissionRequest $request) {
    return (new ContactSubmissionController())->store($request);
})->name('contact.store')->middleware(ProtectAgainstSpam::class);

// Pulse
Route::get(config('app.login_route'), static fn () => redirect('/pulse'))->name('login')->middleware('auth.basic');
