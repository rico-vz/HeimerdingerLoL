@extends('layouts.app')

@section('title', 'Heimerdinger • Discover LoL: Champions, Skins, Sales & More!')
@section('description',
    'Explore League of Legends champions, skins, and game assets on Heimerdinger.
    Your ultimate source for in-depth information on LoL gaming. Dive in now!')

@section('content')
    <x-home.features />

    @if ($upcomingSkins != [])
        <x-home.upcoming_skins :upcomingSkins="$upcomingSkins" />
        <div class="flex justify-center my-4">
            <x-ads.horizontal-banner />
        </div>
    @endif
    <x-home.recent_skins :latestSkins="$latestSkins" />
@endsection
