@extends('layouts.app')

@section('title', 'Heimerdinger.LoL • Icons')
@section('description',
    'Explore all LoL icons on Heimerdinger.LoL. Find detailed information on popular summoner icons
    such as Qiyana Champie 2, Omen of the Cursed Revenant, Lil\' Sprout, Dominion Retirement, Winterblessed Hwei and more!')

    @push('top_scripts')
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4505764048662657"
            crossorigin="anonymous"></script>
    @endpush

@section('content')
    <x-icons.list_all :icons="$icons" />
@endsection

@push('bottom_scripts')
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
@endpush
