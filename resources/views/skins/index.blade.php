@extends('layouts.app')

@section('title', 'Heimerdinger • Skins')
@section('description',
    'Explore all champion skins on Heimerdinger.LoL. Find detailed information on popular skins
    such as Dark Cosmic Jhin, HEARTSTEEL Ezreal, PROJECT: Vayne and more!')

    @push('top_scripts')
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4505764048662657"
            crossorigin="anonymous"></script>
    @endpush

@section('content')
    <x-skins.paginatedlist :skins="$skins" :rarity-color="$rarityColor" />
@endsection

@push('bottom_scripts')
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
@endpush
