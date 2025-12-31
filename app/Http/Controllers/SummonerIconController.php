<?php

namespace App\Http\Controllers;

use App\Models\SummonerIcon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Spatie\QueryBuilder\QueryBuilder;

class SummonerIconController extends Controller
{
    public function index()
    {
        $cacheKey = 'icons_' . md5(serialize(request()->query()));

        $icons = Cache::remember($cacheKey, 60 * 60, function () {
            return QueryBuilder::for(SummonerIcon::class)
                ->allowedFilters(['title', 'esports_team', 'release_year'])
                ->defaultSort('-icon_id')
                ->paginate(72)
                ->appends(request()->query());
        });

        return view('icons.index', ['icons' => $icons]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'icon_id' => ['required', 'integer'],
            'title' => ['nullable'],
            'release_year' => ['nullable', 'integer'],
            'legacy' => ['required'],
            'image' => ['required'],
            'esports_team' => ['nullable'],
            'esports_region' => ['nullable'],
            'esports_event' => ['nullable'],
            'description' => ['nullable'],
        ]);

        return SummonerIcon::create($request->validated());
    }

    public function show(SummonerIcon $summonerIcon)
    {
        $icon = $summonerIcon;

        return view('icons.show', ['icon' => $icon]);
    }

    public function update(Request $request, SummonerIcon $summonerIcon)
    {
        $request->validate([
            'icon_id' => ['required', 'integer'],
            'title' => ['nullable'],
            'release_year' => ['nullable', 'integer'],
            'legacy' => ['required'],
            'image' => ['required'],
            'esports_team' => ['nullable'],
            'esports_region' => ['nullable'],
            'esports_event' => ['nullable'],
            'description' => ['nullable'],
        ]);

        $summonerIcon->update($request->validated());

        return $summonerIcon;
    }

    public function destroy(SummonerIcon $summonerIcon)
    {
        $summonerIcon->delete();

        return response()->json();
    }
}
