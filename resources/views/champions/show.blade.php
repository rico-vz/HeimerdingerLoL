@extends('layouts.app')

@section('title', $champion->name . ' • Heimerdinger.LoL')
@section('description', 'Heimerdinger.LoL: ' . $champion->name . ' details showing all the information you need to know
 about ' . $champion->name . ', ' . $champion->title . '. ' . substr($champion->lore, 0, 50) . '...')

@section('content')
    <x-champions.grid_info :champion="$champion" :streamers="$streamers"/>
@endsection

@push('bottom_scripts')
    @vite('resources/js/vert-scroll.js')
@endpush

