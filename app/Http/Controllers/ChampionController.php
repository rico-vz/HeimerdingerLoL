<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChampionRequest;
use App\Http\Requests\UpdateChampionRequest;
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

        $champions = Cache::remember('championsListAllCache', $eightHoursInSeconds, function () {
            return Champion::orderBy('name')->get();
        });

        $roles = Cache::remember('championsRolesCache', $eightHoursInSeconds, function () {
            return ChampionRoles::orderBy('champion_name')->get();
        });

        return view('champions.index', compact('champions', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreChampionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Champion $champion)
    {
        $eightHoursInSeconds = 60 * 60 * 8;
        $dayInSeconds = 60 * 60 * 24;

        $champion = Cache::remember('championShowCache' . $champion->slug, $eightHoursInSeconds, function () use ($champion) {
            return $champion->load('skins', 'lanes');
        });

        $splashColor = Cache::remember(
            'championSplashColorCache' . $champion->slug,
            $dayInSeconds,
            function () use ($champion) {
                return getAverageColorFromImageUrl($champion->getChampionImageAttribute());
            }
        );

        $champion->splash_color = $splashColor;

        return view('champions.show', compact('champion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Champion $champion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChampionRequest $request, Champion $champion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Champion $champion)
    {
        //
    }
}
