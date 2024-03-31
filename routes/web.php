<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AssetsController;
use App\Http\Controllers\ChampionController;
use App\Http\Controllers\ChampionSkinController;
use App\Http\Controllers\ContactSubmissionController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HTMLSitemapController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SummonerEmoteController;
use App\Http\Controllers\SummonerIconController;
use App\Http\Requests\ContactSubmissionRequest;
use App\Models\Champion;
use App\Models\SummonerIcon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Spatie\Honeypot\ProtectAgainstSpam;
use Spatie\Sheets\Sheet;

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

Route::get('/', static fn () => (new HomeController())->index())->name('home');

Route::get('/support-me', static fn () => (new HomeController())->support())->name('support');

Route::get('/roadmap', static fn () => (new HomeController())->roadmap())->name('roadmap');

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

// Site Map
Route::get('/resource/sitemap', static fn () => (new HTMLSitemapController())->index())->name('sitemap.index');

// Pulse
Route::get(config('app.login_route'), static fn () => redirect('/pulse'))->name('login')->middleware('auth.basic');

// Streamer Panel
Route::get('/streamerpanel', static fn () => (new \App\Http\Controllers\StreamerPanelController())->index())->name('streamerpanel.index')->middleware('auth.basic');
Route::get('/streamerpanel/add', static fn () => (new \App\Http\Controllers\StreamerPanelController())->create())->name('streamerpanel.streamers.create')->middleware('auth.basic');
Route::post('/streamerpanel/add', static fn (Request $request) => (new \App\Http\Controllers\StreamerPanelController())->store($request))->name('streamerpanel.store')->middleware('auth.basic');
Route::get('/streamerpanel/edit/{streamer}', static fn (\App\Models\Streamer $streamer) => (new \App\Http\Controllers\StreamerPanelController())->edit($streamer))->name('streamerpanel.edit')->middleware('auth.basic');
Route::post('/streamerpanel/edit/{streamer}', static fn (Request $request, \App\Models\Streamer $streamer) => (new \App\Http\Controllers\StreamerPanelController())->update($request, $streamer))->name('streamerpanel.update')->middleware('auth.basic');
Route::delete('/streamerpanel/delete/{streamer}', static fn (\App\Models\Streamer $streamer) => (new \App\Http\Controllers\StreamerPanelController())->destroy($streamer))->name('streamerpanel.destroy')->middleware('auth.basic');
