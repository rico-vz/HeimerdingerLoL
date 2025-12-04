@extends('layouts.app')

@section('title', 'Heimerdinger • Sale Rotation')
@section('description',
    'Explore the current LoL Sale on Heimerdinger.LoL. Find detailed information on what champions
    and skins are currently on sale and grab a good deal!')

@section('content')
    @isset($sales)
        <x-sales.current_sales :sales="$sales" />
    @else
        <section class="max-w-screen-xl mx-auto mt-12">
            <h1
                class="text-3xl font-bold text-center text-transparent uppercase sm:text-4xl bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text">
                Sale Rotation</h1>
            <p class="mt-6 text-lg text-center text-white">Sale Rotation is currently under construction due to breaking changes. We are sorry</p>
        </section>
    @endisset
    <x-buymeacoffee.floating />
@endsection
