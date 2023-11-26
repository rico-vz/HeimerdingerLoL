<?php

namespace App\Http\Controllers;

use App\Models\SummonerEmote;
use Illuminate\Http\Request;

class SummonerEmoteController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', SummonerEmote::class);

        return SummonerEmote::all();
    }

    public function store(Request $request)
    {
        $this->authorize('create', SummonerEmote::class);

        $request->validate([
            'emote_id' => ['required', 'integer'],
            'title' => ['required'],
            'image' => ['required'],
        ]);

        return SummonerEmote::create($request->validated());
    }

    public function show(SummonerEmote $summonerEmote)
    {
        $this->authorize('view', $summonerEmote);

        return $summonerEmote;
    }

    public function update(Request $request, SummonerEmote $summonerEmote)
    {
        $this->authorize('update', $summonerEmote);

        $request->validate([
            'emote_id' => ['required', 'integer'],
            'title' => ['required'],
            'image' => ['required'],
        ]);

        $summonerEmote->update($request->validated());

        return $summonerEmote;
    }

    public function destroy(SummonerEmote $summonerEmote)
    {
        $this->authorize('delete', $summonerEmote);

        $summonerEmote->delete();

        return response()->json();
    }
}
