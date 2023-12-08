@extends('layouts.app')

@section('title', 'Heimerdinger.LoL • Assets')
@section('description', 'Explore game assets on Heimerdinger.LoL. Find detailed information on all icons and emotes
 available in League of Legends!')

@section('content')
    <h1
        class="mt-7 text-3xl font-bold text-center text-transparent uppercase sm:text-4xl
        bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text">
        Assets</h1>
    <h2
        class="text-lg font-bold text-center text-transparent uppercase
        bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text ">
        LoL Icons & Emotes</h2>

    <div class="container mx-auto p-4 flex items-center justify-center mt-3 flex-grow">
        <div class="text-center items-center justify-center align-middle">
            <img class="items-center mx-auto" src="{{asset('img/heimerdinger-emote.webp')}}"
                 alt="Heimerdinger Emote">
            <p class="text-gray-100">Tired of endless browsing to find that one icon or emote you love?</p>
            <p class="text-gray-100 ">We got you covered! Search through <span
                    class="underline decoration-orange-500/50 font-medium">all</span>
                icons &
                emotes with ease. </p>
            <p class="mb-6 text-gray-100">Automatically updated and sorted by release date.</p>
            <p class="text-gray-200 mb-3">Click on the asset category you'd like to view below to get started!</p>
            <div class="flex justify-center space-x-4">
                <a href="{{route('assets.icons.index')}}"
                   class="bg-orange-500 text-white font-bold py-2 px-4 rounded hover:bg-orange-600">Icons</a>
                <a href="{{route('assets.emotes.index')}}"
                   class="bg-orange-500 text-white font-bold py-2 px-4 rounded hover:bg-orange-600">Emotes</a>
            </div>
        </div>
    </div>
@endsection
