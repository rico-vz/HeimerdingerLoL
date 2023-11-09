<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChampionSkinRequest;
use App\Http\Requests\UpdateChampionSkinRequest;
use App\Models\ChampionSkin;
use Illuminate\Support\Facades\Cache;

class ChampionSkinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skins = Cache::remember('championSkinsListAllCache' . request('page', 1), 60 * 60 * 8, function () {
            return ChampionSkin::orderBy('id')->paginate(16);
        });

        $rarityColor = [
            'Common' => 'text-stone-300',
            'Epic' => 'text-blue-400',
            'Legendary' => 'text-red-500',
            'Rare' => 'text-pink-300',
            'Mythic' => 'text-purple-500',
            'Ultimate' => 'text-yellow-400',
        ];

        return view('skins.index', compact('skins', 'rarityColor'));
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
        //
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
