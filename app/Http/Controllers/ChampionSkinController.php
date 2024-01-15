<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChampionSkinRequest;
use App\Http\Requests\UpdateChampionSkinRequest;
use App\Models\ChampionSkin;
use Illuminate\Support\Facades\Cache;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ChampionSkinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skins = QueryBuilder::for(ChampionSkin::class)
            ->allowedFilters(AllowedFilter::partial('name', 'skin_name'), 'rarity')
            ->paginate(16)
            ->appends(request()->query());

        $rarityColor = [
            'Common' => 'text-stone-300',
            'Epic' => 'text-blue-400',
            'Legendary' => 'text-red-500',
            'Rare' => 'text-pink-300',
            'Mythic' => 'text-purple-500',
            'Ultimate' => 'text-yellow-400',
        ];

        return view('skins.index', ['skins' => $skins, 'rarityColor' => $rarityColor]);
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
    public function store(StoreChampionSkinRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ChampionSkin $championSkin)
    {
        $skin = Cache::remember(
            'championSkinShowCache' . $championSkin->slug,
            60 * 60 * 48,
            static fn () => $championSkin->load('champion', 'chromas')
        );

        $splashColor = Cache::remember(
            'championSkinSplashColorCache' . $championSkin->slug,
            60 * 60 * 120,
            static fn () => getAverageColorFromImageUrl($championSkin->getSkinImageAttribute())
        );

        $skin->splash_color = $splashColor;

        return view('skins.show', ['skin' => $skin]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ChampionSkin $championSkin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChampionSkinRequest $request, ChampionSkin $championSkin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ChampionSkin $championSkin)
    {
        //
    }
}
