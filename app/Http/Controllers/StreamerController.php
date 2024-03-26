<?php

namespace App\Http\Controllers;

use App\Models\Streamer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;


class StreamerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Streamer $streamer)
    {
        //
    }

    /**
     * API: JSON response of all streamers.
     * Data is cached for 12 hours.
     */
    public function all()
    {
        $streamers = Cache::remember('streamersListAllAPICache', 60 * 60 * 12, static fn () => Streamer::orderBy('champion_id')->get());

        return response()->json($streamers);
    }
}
