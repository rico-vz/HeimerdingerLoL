@extends('layouts.app')

@section('title', $icon->title . ' • Heimerdinger')
@section('description', 'Heimerdinger.LoL: ' . $icon->title . ' details showing all the information about the icon
    released in ' . $icon->release_year . '. ' . substr($icon->description, 0, 64) . '...')
    @push('top_scripts')
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4505764048662657"
            crossorigin="anonymous"></script>
    @endpush
@section('content')
    <x-icons.view_grid :icon="$icon" />
@endsection

@push('bottom_scripts')
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
@endpush
