@extends('layouts.app')

@section('title', 'Heimerdinger • Skins')
@section('description', 'Explore all champion skins on Heimerdinger.LoL. Find detailed information on popular skins
such as Dark Cosmic Jhin, HEARTSTEEL Ezreal, PROJECT: Vayne and more!')

@section('content')
    <x-skins.paginatedlist :skins="$skins" :rarity-color="$rarityColor"/>
@endsection
