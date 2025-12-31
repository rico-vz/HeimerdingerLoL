<?php

namespace App\Http\Controllers;

use App\Models\SummonerEmote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Spatie\QueryBuilder\QueryBuilder;

class SummonerEmoteController extends Controller
{
    public function index()
    {
        $cacheKey = 'emotes_' . md5(serialize(request()->query()));

        $emotes = Cache::remember($cacheKey, 60 * 60, function () {
            return QueryBuilder::for(SummonerEmote::class)
                ->allowedFilters('title')
                ->defaultSort('-emote_id')
                ->paginate(72)
                ->appends(request()->query());
        });

        return view('emotes.index', ['emotes' => $emotes]);
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
