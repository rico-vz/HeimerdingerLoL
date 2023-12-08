@extends('layouts.app')

@section('title', $skin->skin_name . ' • Heimerdinger.LoL')
@section('description', 'Heimerdinger.LoL: ' . $skin->skin_name . ' details showing all the information about
the ' . $skin->rarity . ' ' . $skin->champion->name . ' skin. ' . substr($skin->lore, 0, 50) . '...')

@section('content')
    <x-skins.grid_info :skin="$skin"/>
@endsection

@push('bottom_scripts')
    @vite('resources/js/vert-scroll.js')
@endpush
