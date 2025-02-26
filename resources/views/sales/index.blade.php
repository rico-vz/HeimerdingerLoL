@extends('layouts.app')

@section('title', 'Heimerdinger • Sale Rotation')
@section('description',
    'Explore the current LoL Sale on Heimerdinger.LoL. Find detailed information on what champions
    and skins are currently on sale and grab a good deal!')

@section('content')
    <x-sales.current_sales :sales="$sales" />
    <x-buymeacoffee.floating />
@endsection
