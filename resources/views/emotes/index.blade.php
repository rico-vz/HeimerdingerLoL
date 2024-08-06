@extends('layouts.app')

@section('title', 'Heimerdinger • Emotes')
@section('description',
    'Explore all LoL Emotes on Heimerdinger.LoL. Find detailed information on popular emotes such as
    Dab Pengu, Bee Mad, Little Camper, Super Shy, PENGUMODE and more!')

    @push('top_scripts')
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4505764048662657"
            crossorigin="anonymous"></script>
    @endpush
@section('content')
    <x-emotes.list_all :emotes="$emotes" />
@endsection

@push('bottom_scripts')
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
@endpush
