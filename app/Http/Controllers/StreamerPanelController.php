<?php

namespace App\Http\Controllers;

use App\Models\Streamer;
use App\Models\Champion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class StreamerPanelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('streamerpanel.index', [
            'streamers' => Streamer::with('champion')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('streamerpanel.streamer-create', [
            'champions' => Champion::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['champion_id' => 'required|exists:champions,champion_id',
            'platform' => 'required|in:twitch,youtube,kick,douyu,huya',
            'username' => 'required|string',
            'displayname' => 'required|string',
        ]);

        Streamer::create($request->all());

        Cache::forget('streamersListAllAPICache');

        return redirect()->route('streamerpanel.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Streamer $streamer)
    {
        return view('streamerpanel.streamer-edit', [
            'streamer' => $streamer,
            'champions' => Champion::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Streamer $streamer)
    {
        $request->validate([
            'champion_id' => 'required|exists:champions,id',
            'platform' => 'required|in:twitch,youtube,kick,douyu,huya',
            'username' => 'required|string',
            'displayname' => 'required|string',
        ]);

        $streamer->update($request->all());

        Cache::forget('streamersListAllAPICache');

        return redirect()->route('streamerpanel.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Streamer $streamer)
    {
        $streamer->delete();

        Cache::forget('streamersListAllAPICache');

        return redirect()->route('streamerpanel.index');
    }
}
