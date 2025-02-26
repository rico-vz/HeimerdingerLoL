@extends('layouts.app')

@section('title', 'Heimerdinger.LoL • Icons')
@section('description',
    'Explore all LoL icons on Heimerdinger.LoL. Find detailed information on popular summoner icons
    such as Qiyana Champie 2, Omen of the Cursed Revenant, Lil\' Sprout, Dominion Retirement, Winterblessed Hwei and more!')

@section('content')
    <x-icons.list_all :icons="$icons" />
@endsection
