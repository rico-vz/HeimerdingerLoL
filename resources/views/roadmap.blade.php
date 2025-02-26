@extends('layouts.app')

@section('title', 'Heimerdinger • Roadmap')
@section('description', 'See what\'s coming next to Heimerdinger.lol. Vote on features you\'d like to see implemented
    next.')

@section('content')
    <section class="text-white bg-stone-900">
        <div class="max-w-screen-xl px-4 py-8 mx-auto sm:py-12 sm:px-6 lg:py-16 lg:px-8">
            <div class="max-w-3xl mx-auto text-center">
                <h1
                    class="text-3xl font-bold text-transparent uppercase sm:text-4xl bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text">
                    Roadmap</h1>

                <h2 class="mt-4 text-stone-300">
                    See what's coming next to Heimerdinger.lol. Vote on features you'd like to see implemented next.
                </h2>
                <div class="flex justify-center my-4">
                    <x-ads.horizontal-banner />
                </div>
                <p class="mt-4 mb-8">
                    View the full roadmap at <a href="https://heimerdinger.features.vote/roadmap"
                        class="text-orange-300 hover:text-orange-500">Heimerdinger Features Roadmap</a>.
                </p>
            </div>
            <div class="mx-auto ">
                <div class="mx-auto mt-4" id="feature-map">

                </div>
            </div>
        </div>
    </section>

    <script src="https://features.vote/widget/widget.js" slug="heimerdinger" onload="window.loadVotingBoard('feature-map')">
    </script>
@endsection
