@use('Carbon\Carbon')
@extends('layouts.app')

@section('title', $post->title . ' • Heimerdinger.LoL')
@section('description', 'Heimerdinger.LoL: ' . $post->description)

@section('content')
    <a href="{{route('posts.index')}}"
       class="block mt-8 text-center text-orange-400 text-sm uppercase font-medium hover:underline">Back
        to
        posts</a>
    <article class="max-w-screen-md mx-auto mt-2 prose prose-stone prose-invert" itemscope
             itemtype="https://schema.org/BlogPosting"
             itemid="{{url()->current()}}">
        <meta itemprop="wordCount" content="{{str_word_count($post->contents)}}">
        <h3 class="not-prose text-sm text-center text-orange-100 font-semibold" itemprop="datePublished">
            {{ Carbon::parse($post->date)->format('F d, Y') }}
        </h3>
        <div>
            <h1
                class="not-prose text-3xl font-bold text-center text-transparent uppercase sm:text-4xl
        bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text" itemprop="headline">
                “{{$post->title}}”</h1>
            <h2 class="not-prose text-center text-orange-400 text-sm italic" itemprop="description">
                “{{ $post->description }}”
            </h2>
            <p>
                {{$post->contents}}
            </p>
            <p class="mt-3 text-sm text-center">
                Tagged with: <span itemprop="keywords"
                                   class="italic">
                    {{ isset($post->tags) ? implode(', ', $post->tags)
                       : 'League of Legends' }}</span>
            </p>
        </div>
    </article>
@endsection
