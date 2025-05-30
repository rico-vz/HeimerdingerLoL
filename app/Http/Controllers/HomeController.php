<?php

namespace App\Http\Controllers;

use App\Models\ChampionSkin;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {
        $upcomingSkins = Cache::remember('upcomingSkins_home', 60 * 4, static fn() => ChampionSkin::where('availability', 'Upcoming')
            ->where(function ($query) {
                $query->where('release_date', '0000-00-00')
                    ->orWhere('release_date', '>', now());
            })
            ->orderBy('release_date', 'desc')->get());


        $latestSkins = Cache::remember('latestSkins_home', 60 * 4, static fn() => ChampionSkin::where('release_date', '!=', '0000-00-00')
            ->orderBy('release_date', 'desc')->get());

        return view('home', [
            'latestSkins' => $latestSkins,
            'upcomingSkins' => $upcomingSkins,
        ]);
    }

    public function donate()
    {
        return view('donate');
    }

    public function roadmap()
    {
        return view('roadmap');
    }
}
