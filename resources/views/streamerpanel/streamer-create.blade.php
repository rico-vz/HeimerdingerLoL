@extends('layouts.streamerpanel')

@section('title', 'Streamer Panel • Heimerdinger.LoL')
@section('description', 'Heimerdinger.LoL: Streamer Panel for managing your streamer requests.')

@section('content')
    <section class="max-w-screen-xl mx-auto mt-12">
        <h1
            class="text-2xl font-bold text-center text-transparent uppercase sm:text-4xl bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text">
            Add a new Streamer</h1>
        <x-streamerpanel.streamer-create-form :champions="$champions" />

    </section>

@endsection
