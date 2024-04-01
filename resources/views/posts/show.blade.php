@use('Carbon\Carbon')
@extends('layouts.app')

@section('title', $post->title)
@section('description', 'Heimerdinger.LoL: ' . $post->description)

@section('og_image', $post->thumbnail)

@push('meta_tags')
    <link rel="canonical" href="{{ config('app.HEIMER_URL') . '/post/' . $post->slug }}">

    <meta name="author" content="Heimerdinger.LoL">
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow">
@endpush

@section('content')
    <a href="{{ route('posts.index') }}"
        class="block mt-8 text-sm font-medium text-center text-orange-400 uppercase hover:underline">Back
        to
        posts</a>
    <article class="max-w-screen-md mx-auto mt-2 prose prose-stone prose-invert" itemscope
        itemtype="https://schema.org/BlogPosting" itemid="{{ url()->current() }}">
        <meta itemprop="wordCount" content="{{ str_word_count($post->contents) }}">
        <h3 class="text-sm font-semibold text-center text-orange-100 not-prose" itemprop="datePublished">
            {{ Carbon::parse($post->date)->format('F d, Y') }}
        </h3>
        <img src="{{ $post->thumbnail }}" alt="{{ $post->title }} Thumbnail"
            class="w-auto mx-auto mt-2 mb-2 border-2 not-prose aspect-video max-h-64 rounded-3xl border-orange-500/40" />
        <meta itemprop="thumbnailUrl" content="{{ $post->thumbnail }}" />
        <div>
            <h1 class="text-3xl font-bold text-center text-transparent uppercase not-prose sm:text-4xl bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text"
                itemprop="headline">
                “{{ $post->title }}”</h1>
            <h2 class="text-sm italic text-center text-orange-400 not-prose" itemprop="description">
                “{{ $post->description }}”
            </h2>
            <p>
                {{ $post->contents }}
            </p>
            <p class="mt-3 text-sm text-center">
                Tagged with: <span itemprop="keywords" class="italic">
                    {{ isset($post->tags) ? implode(', ', $post->tags) : 'League of Legends' }}</span>
            </p>
        </div>
    </article>
@endsection
