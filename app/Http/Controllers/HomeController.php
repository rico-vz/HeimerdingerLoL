<?php

namespace App\Http\Controllers;

use App\Models\ChampionSkin;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {
        $upcomingSkins = Cache::remember('upcomingSkins_home', 60 * 4, function () {
            return ChampionSkin::where('availability', 'Upcoming')
                ->orderBy('release_date', 'desc')->get();
        });

        $latestSkins = Cache::remember('latestSkins_home', 60 * 4, function () {
            return ChampionSkin::where('availability', 'Available')
                ->orderBy('release_date', 'desc')->take(9)->get();
        });

        return view('home', [
            'latestSkins' => $latestSkins,
            'upcomingSkins' => $upcomingSkins,
        ]);
    }
}
