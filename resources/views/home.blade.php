@extends('layouts.app')

@section('title', 'Heimerdinger.LoL • Home')
@section('description', 'Explore League of Legends champions, skins, and game assets on Heimerdinger.LoL.
Your ultimate source for in-depth information on LoL gaming. Dive in now!')

@section('content')
    <x-home.features/>
    @if ($upcomingSkins != [])
        <x-home.upcoming_skins :upcomingSkins="$upcomingSkins"/>
    @endif
    <x-home.recent_skins :latestSkins="$latestSkins"/>
@endsection
