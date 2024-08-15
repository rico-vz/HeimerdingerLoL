@extends('layouts.app')

@section('title', 'Heimerdinger • Champions')
@section('description',
    'Explore the world of League of Legends champions on Heimerdinger.LoL. Find detailed
    information on top picks like Heimerdinger, Ezreal, Jinx and Lux. Dive into the action now!')

    @push('top_scripts')
        @vite('resources/js/lane-filter.js')
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4505764048662657"
            crossorigin="anonymous"></script>
    @endpush

@section('content')
    <x-champions.list_all :champions="$champions" :roles="$roles" />
@endsection

@push('bottom_scripts')
    @include('popper::assets')
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
@endpush
