@extends('layouts.app')

@section('title', 'Heimerdinger • 402 Payment Required')
@section('description', 'Explore League of Legends champions, skins, and game assets on Heimerdinger.')

@section('content')

<div class="flex items-center justify-center h-screen">
    <div class="text-center">
        <h1 class="font-bold text-orange-400 text-8xl">402</h1>
        <h2 class="text-3xl font-bold text-white">Payment Required</h2>
        <p class="mb-8 text-stone-300">You need to make a payment to view this page.</p>
        <a href="/" class="px-4 py-2 mt-4 text-white bg-orange-400 rounded-md hover:bg-orange-500">Go back to the homepage</a>
    </div>
</div>
@endsection
