@extends('layouts.streamerpanel')

@section('title', 'Streamer Panel • Heimerdinger.LoL')
@section('description', 'Heimerdinger.LoL: Streamer Panel for managing your streamer requests.')

@section('content')
    <x-streamerpanel.home />
    <x-streamerpanel.streamersTable :streamers="$streamers" />
@endsection
