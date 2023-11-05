<?php

namespace App\Http\Controllers;

use App\Models\ChampionSkin;

class HomeController extends Controller
{
    public function index()
    {
        $skins = ChampionSkin::orderBy('release_date', 'desc')->get();

        return view('home', [
            'skins' => $skins,
        ]);
    }
}
