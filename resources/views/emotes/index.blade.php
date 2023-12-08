@extends('layouts.app')

@section('title', 'Heimerdinger.LoL • Emotes')
@section('description', 'Explore all LoL Emotes on Heimerdinger.LoL. Find detailed information on popular emotes such as
Dab Pengu, Bee Mad, Little Camper, Super Shy, PENGUMODE and more!')

@section('content')
    <x-emotes.list_all :emotes="$emotes"/>
@endsection
