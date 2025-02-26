@extends('layouts.app')

@section('title', 'Heimerdinger • Assets')
@section('description',
    'Explore game assets on Heimerdinger.LoL. Find detailed information on all icons and emotes
    available in League of Legends!')

@section('content')

    <h1
        class="text-3xl font-bold text-center text-transparent uppercase mt-7 sm:text-4xl bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text">
        Assets</h1>
    <h2
        class="text-lg font-bold text-center text-transparent uppercase bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text">
        LoL Icons & Emotes</h2>

    <div class="container flex items-center justify-center flex-grow p-4 mx-auto mt-3">
        <div class="items-center justify-center text-center align-middle">
            <img class="items-center mx-auto" src="{{ asset('img/heimerdinger-emote.webp') }}" alt="Heimerdinger Emote">
            <p class="text-gray-100">Tired of endless browsing to find that one icon or emote you love?</p>
            <p class="text-gray-100">We got you covered! Search through <span
                    class="font-medium underline decoration-orange-500/50">all</span>
                icons &
                emotes with ease. </p>
            <p class="mb-6 text-gray-100">Automatically updated and sorted by release date.</p>
            <p class="mb-3 text-gray-200">Click on the asset category you'd like to view below to get started!</p>
            <div class="flex justify-center space-x-4">
                <a href="{{ route('assets.icons.index') }}"
                    class="px-4 py-2 font-bold text-white bg-orange-500 rounded hover:bg-orange-600">Icons</a>
                <a href="{{ route('assets.emotes.index') }}"
                    class="px-4 py-2 font-bold text-white bg-orange-500 rounded hover:bg-orange-600">Emotes</a>
            </div>
        </div>

    </div>


@endsection
