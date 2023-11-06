<?php

namespace App\Http\Controllers;

use App\Models\ChampionSkin;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {
        $skins = Cache::remember('skins', 60 * 4, function () {
            return ChampionSkin::orderBy('release_date', 'desc')->get();
        });

        $upcomingSkins = Cache::remember('upcomingSkins', 60 * 4, function () use ($skins) {
            return $skins->where('availability', 'Upcoming');
        });

        return view('home', [
            'skins' => $skins,
            'upcomingSkins' => $upcomingSkins,
        ]);
    }
}
