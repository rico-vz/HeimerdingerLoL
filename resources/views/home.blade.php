@extends('layouts.app')

@section('title', 'Heimerdinger • Discover LoL: Champions, Skins, Sales & More!')
@section('description',
    'Explore League of Legends champions, skins, and game assets on Heimerdinger.
    Your ultimate source for in-depth information on LoL gaming. Dive in now!')

    @push('top_scripts')
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4505764048662657"
            crossorigin="anonymous"></script>
    @endpush

@section('content')
    <x-home.features />

    @if ($upcomingSkins != [])
        <x-home.upcoming_skins :upcomingSkins="$upcomingSkins" />
    @endif
    <x-home.recent_skins :latestSkins="$latestSkins" />
@endsection

@push('bottom_scripts')
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
@endpush
