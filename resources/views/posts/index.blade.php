@extends('layouts.app')

@section('title', 'Heimerdinger.LoL • Posts')
@section('description', 'Explore all our blog posts on Heimerdinger.LoL. Posts about League of Legends and more.')

@section('content')
    <section class="max-w-screen-xl mx-auto mt-12">
        <h1
            class="text-3xl font-bold text-center text-transparent uppercase sm:text-4xl
        bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text">
            Posts</h1>
        <h2 class="text-center text-orange-400 text-sm uppercase font-medium">Our latest posts about League of
            Legends</h2>
        <x-posts.listposts :posts="$posts"/>
    </section>
@endsection
