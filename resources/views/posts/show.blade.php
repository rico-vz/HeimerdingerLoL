@use('Carbon\Carbon')
@extends('layouts.app')

@section('title', $post->title)
@section('description', $post->description)
@if($post->thumbnail)
    @section('og_image', $post->thumbnail)
@endif

@push('meta_tags')
    <link rel="canonical" href="{{ config('app.HEIMER_URL') . '/post/' . $post->slug }}">
    <meta name="author" content="Heimerdinger.LoL">
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow">

    {{-- Schema.org for SEO --}}
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "BlogPosting",
        "headline": "{{ $post->title }}",
        "image": "{{ $post->thumbnail }}",
        "editor": "Heimerdinger.LoL",
        "genre": "{{ isset($post->tags) ? implode(' ', $post->tags) : 'League of Legends' }}",
        "keywords": "{{ isset($post->tags) ? implode(' ', $post->tags) : 'League of Legends' }}",
        "wordcount": "{{ str_word_count(strip_tags($post->contents)) }}",
        "publisher": {
            "@type": "Organization",
            "name": "Heimerdinger.LoL",
            "logo": {
                "@type": "ImageObject",
                "url": "{{ asset('img/heimerdinger-logo.png') }}"
            }
        },
        "url": "{{ url()->current() }}",
        "datePublished": "{{ Carbon::parse($post->date)->toIso8601String() }}",
        "dateCreated": "{{ Carbon::parse($post->date)->toIso8601String() }}",
        "dateModified": "{{ Carbon::parse($post->date)->toIso8601String() }}",
        "description": "{{ $post->description }}",
        "articleBody": "{{ str_replace('"', '\"', strip_tags($post->contents)) }}",
        "author": {
            "@type": "Person",
            "name": "Heimerdinger.LoL",
            "url": "{{ route('home') }}"
        },
        "mainEntityOfPage": {
             "@type": "WebPage",
             "@id": "{{ url()->current() }}"
        }
    }
    </script>
@endpush

@section('content')
    <div class="py-10 min-h-screen text-stone-100 selection:bg-orange-500 selection:text-white">
        <nav class="container px-6 mx-auto mb-8 max-w-5xl" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('home') }}" class="inline-flex items-center text-sm font-medium text-stone-400 hover:text-orange-400">
                        <svg class="mr-2.5 w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                        </svg>
                        Home
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="mx-1 w-3 h-3 text-stone-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <a href="{{ route('posts.index') }}" class="ml-1 text-sm font-medium text-stone-400 hover:text-orange-400 md:ml-2">Blog</a>
                    </div>
                </li>
            </ol>
        </nav>

        <article class="container px-6 mx-auto max-w-5xl">
            <header class="mb-10 text-center">
                <div class="flex gap-2 justify-center items-center mb-4 text-sm text-orange-400">
                    <span class="font-medium">{{ Carbon::parse($post->date)->format('F d, Y') }}</span>
                    <span>&bull;</span>
                    <span>{{ ceil(str_word_count(strip_tags($post->contents)) / 200) }} min read</span>
                </div>

                <h1 class="mb-6 text-3xl font-extrabold tracking-tight leading-tight text-white md:text-5xl lg:text-6xl">
                    {{ $post->title }}
                </h1>

                @if($post->description)
                <p class="mx-auto mb-8 max-w-2xl text-xl italic leading-relaxed text-stone-400">
                    {{ $post->description }}
                </p>
                @endif

                @if($post->thumbnail)
                <div class="overflow-hidden relative mb-10 w-full rounded-2xl ring-1 shadow-2xl aspect-video ring-white/10">
                    <img src="{{ $post->thumbnail }}"
                         alt="{{ $post->title }}"
                         class="object-cover w-full h-full transition duration-700 transform hover:scale-105"
                         loading="eager"
                         width="1920"
                         height="1080">
                </div>
                @endif
            </header>

            <div class="mb-16 max-w-none prose prose-lg prose-invert prose-orange prose-headings:font-bold prose-headings:tracking-tight prose-headings:text-stone-100 prose-p:text-stone-300 prose-p:leading-relaxed prose-a:text-orange-400 prose-a:no-underline hover:prose-a:underline prose-blockquote:border-l-orange-500 prose-blockquote:bg-stone-800/50 prose-blockquote:py-2 prose-blockquote:px-6 prose-blockquote:rounded-r-lg prose-blockquote:italic prose-img:rounded-xl prose-img:shadow-lg prose-code:text-orange-300 prose-code:bg-stone-800 prose-code:px-1 prose-code:py-0.5 prose-code:rounded prose-code:before:content-none prose-code:after:content-none">
                {!! $post->contents !!}
            </div>

            @if(isset($post->tags) && count($post->tags) > 0)
            <div class="pt-8 mb-12 border-t border-stone-800">
                <h3 class="mb-4 text-sm font-bold tracking-wider uppercase text-stone-500">Topics</h3>
                <div class="flex flex-wrap gap-2">
                    @foreach($post->tags as $tag)
                        <span class="px-3 py-1 text-sm font-medium text-orange-300 rounded-full border bg-orange-900/30 border-orange-500/20">
                            #{{ $tag }}
                        </span>
                    @endforeach
                </div>
            </div>
            @endif

            <div class="flex items-center p-6 mb-16 rounded-2xl border bg-stone-800/50 border-stone-700">
                <div class="flex-shrink-0 mr-4">
                    <div class="flex justify-center items-center w-16 h-16 text-2xl font-bold text-white bg-orange-500 rounded-full shadow-lg">
                        H
                    </div>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-white">Heimerdinger.LoL</h3>
                    <p class="text-sm text-stone-400">Your ultimate source for League of Legends news, guides, and tools. Bringing you the smartest updates from the Rift.</p>
                </div>
            </div>
        </article>

        <div class="py-16 border-t bg-stone-900/50 border-stone-800">
            <div class="container px-6 mx-auto max-w-6xl">

                <div class="grid grid-cols-1 gap-6 mb-16 md:grid-cols-2">
                    @if($previous)
                    <a href="{{ route('posts.show', $previous->slug) }}" class="block p-6 rounded-2xl border transition-all group bg-stone-800 border-stone-700 hover:border-orange-500/50 hover:bg-stone-800/80">
                        <span class="block mb-2 text-xs font-bold tracking-wider text-orange-400 uppercase">&larr; Previous Post</span>
                        <h4 class="text-xl font-bold text-white transition-colors group-hover:text-orange-300">{{ $previous->title }}</h4>
                    </a>
                    @else
                    <div class="p-6"></div>
                    @endif

                    @if($next)
                    <a href="{{ route('posts.show', $next->slug) }}" class="block p-6 text-right rounded-2xl border transition-all group bg-stone-800 border-stone-700 hover:border-orange-500/50 hover:bg-stone-800/80">
                        <span class="block mb-2 text-xs font-bold tracking-wider text-orange-400 uppercase">Next Post &rarr;</span>
                        <h4 class="text-xl font-bold text-white transition-colors group-hover:text-orange-300">{{ $next->title }}</h4>
                    </a>
                    @endif
                </div>

                @if($related && $related->count() > 0)
                <h3 class="pb-4 mb-8 text-2xl font-bold text-white border-b border-stone-800">Read Next</h3>
                <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
                    @foreach($related as $relatedPost)
                    <a href="{{ route('posts.show', $relatedPost->slug) }}" class="flex flex-col h-full group">
                        <div class="overflow-hidden relative mb-4 w-full rounded-xl border transition-all aspect-video bg-stone-800 border-stone-700 group-hover:border-orange-500/50">
                            @if($relatedPost->thumbnail)
                            <img src="{{ $relatedPost->thumbnail }}" alt="{{ $relatedPost->title }}" class="object-cover w-full h-full transition duration-500 group-hover:scale-105" width="1920" height="1080">
                            @else
                            <div class="flex justify-center items-center w-full h-full bg-gradient-to-br from-stone-800 to-stone-900 text-stone-700">
                                <span class="text-4xl opacity-20">LoL</span>
                            </div>
                            @endif
                        </div>
                        <h4 class="mb-2 text-lg font-bold transition-colors text-stone-100 group-hover:text-orange-400 line-clamp-2">
                            {{ $relatedPost->title }}
                        </h4>
                        <p class="flex-grow mb-4 text-sm text-stone-500 line-clamp-2">
                            {{ $relatedPost->description }}
                        </p>
                        <span class="text-xs font-medium tracking-wide text-orange-500 uppercase">Read Article &rarr;</span>
                    </a>
                    @endforeach
                </div>
                @endif

            </div>
        </div>
    </div>
@endsection
