<?php

namespace App\Http\Controllers;

use App\Models\Champion;
use App\Models\ChampionSkin;
use App\Models\SummonerIcon;
use Illuminate\Support\Facades\Cache;
use Spatie\Sheets\Facades\Sheets;

class HTMLSitemapController extends Controller
{
    public function index()
    {
        $twentyHoursInSeconds = 60 * 60 * 20;

        $champions = Cache::remember('sitemap_championsCache', $twentyHoursInSeconds, fn () => Champion::orderBy('name')->get());
        $skins = Cache::remember('sitemap_championSkinsCache', $twentyHoursInSeconds, fn () => ChampionSkin::orderBy('skin_name')->get());
        $icons = Cache::remember('sitemap_iconsCache', $twentyHoursInSeconds, fn () => SummonerIcon::orderBy('title')->get());
        $posts = Sheets::all()->sortByDesc('date');

        return view('sitemap.index', [
            'champions' => $champions,
            'skins' => $skins,
            'icons' => $icons,
            'posts' => $posts,
        ]);
    }
}
