@extends('layouts.app')

@section('title', $icon->title . ' • Heimerdinger')
@section('description', 'Heimerdinger.LoL: ' . $icon->title . ' details showing all the information about the icon released in ' . $icon->release_year . '. ' . substr($icon->description, 0, 64) . '...')

@section('content')
    <x-icons.view_grid :icon="$icon"/>
@endsection
