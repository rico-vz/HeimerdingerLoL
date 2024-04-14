<?php

namespace App\Http\Controllers;

use App\Models\Champion;
use App\Models\ChampionRoles;
use Illuminate\Support\Facades\Cache;

class ChampionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eightHoursInSeconds = 60 * 60 * 8;

        $champions = Cache::remember('championsListAllCache', $eightHoursInSeconds, static fn () => Champion::orderBy('name')->get());

        $roles = Cache::remember('championsRolesCache', $eightHoursInSeconds, static fn () => ChampionRoles::orderBy('champion_name')->get());

        return view('champions.index', ['champions' => $champions, 'roles' => $roles]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Champion $champion)
    {
        $threeDaysInSeconds = 60 * 60 * 24 * 3;
        $sixMonthsInSeconds = 60 * 60 * 24 * 30 * 6;

        $champion = Cache::remember('championShowCache'.$champion->slug, $threeDaysInSeconds, static fn () => $champion->load('streamers', 'skins', 'lanes'));

        $streamers = $champion->load('streamers')->streamers;

        $splashColor = Cache::remember(
            'championSplashColorCache'.$champion->slug,
            $sixMonthsInSeconds,
            static fn () => getAverageColorFromImageUrl('https://wsrv.nl/?url=' . $champion->getChampionImageAttribute(true))
        );

        $champion->splash_color = $splashColor;

        return view('champions.show', ['champion' => $champion, 'streamers' => $streamers]);
    }
}
