@extends('layouts.app')

@section('title', 'Heimerdinger • Sale Rotation')
@section('description',
    'Explore the current LoL Sale on Heimerdinger.LoL. Find detailed information on what champions
    and skins are currently on sale and grab a good deal!')

@section('content')
    @isset($sales)
        <x-sales.current_sales :sales="$sales" />
    @else
        <section class="max-w-screen-xl px-4 mx-auto mt-12">
            <h1
                class="text-3xl font-bold text-center text-transparent uppercase sm:text-4xl bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text">
                Sale Rotation</h1>
            <p class="max-w-2xl mx-auto mt-6 text-lg text-center text-white/80">
                Sale Rotation is currently under construction due to breaking changes. We're working hard to bring it back!
            </p>

            <h2 class="mt-10 text-2xl font-semibold text-center text-white/80">Get Notified When It's Back</h2>

            <div class="flex justify-center mt-3">
                <script async data-uid="b1690d605e" src="https://zenso.kit.com/b1690d605e/index.js"></script>
            </div>

            <p class="mt-2 text-sm text-center text-white/30">
                By signing up, you'll automatically be notified when Sale Rotation is back online.
            </p>
        </section>
    @endisset
@endsection
