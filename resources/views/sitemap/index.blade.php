@extends('layouts.app')

@section('title', 'Heimerdinger • Sitemap (HTML)')
@section('description', 'Discover the complete sitemap for Heimerdinger.LoL,
your go-to source for all things League of Legends.
Explore champions, skins, game assets, and more in one convenient location.')

@section('content')
    <div class="flex justify-center"> <!-- Centering container -->
        <div>
            <h1 class="mt-6 mb-6 text-3xl font-bold text-center text-transparent uppercase sm:text-4xl bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text">
                Heimerdinger Sitemap</h1>
            <div class="grid grid-cols-5 gap-4 ml-16 mr-16">
                <div>
                    <h2 class="text-2xl font-bold text-stone-300">General</h2>
                    <ul class="mt-2">
                            <li class="mb-1">
                                <a href="{{ route('home') }}"
                                   class="text-orange-400 hover:text-orange-500">Home</a>
                            </li>
                        <li class="mb-1">
                            <a href="{{ route('champions.index') }}"
                               class="text-orange-400 hover:text-orange-500">Champions</a>
                        </li>
                        <li class="mb-1">
                            <a href="{{ route('skins.index') }}"
                               class="text-orange-400 hover:text-orange-500">Skins</a>
                        </li>
                        <li class="mb-1">
                            <a href="{{ route('assets.icons.index') }}"
                               class="text-orange-400 hover:text-orange-500">Icons</a>
                        </li>
                        <li class="mb-1">
                            <a href="{{ route('assets.emotes.index') }}"
                               class="text-orange-400 hover:text-orange-500">Emotes</a>
                        </li>
                        <li class="mb-1">
                            <a href="{{ route('sales.index') }}"
                               class="text-orange-400 hover:text-orange-500">Sale Rotation</a>
                        </li>
                        <li class="mb-1">
                            <a href="{{ route('about.index') }}"
                               class="text-orange-400 hover:text-orange-500">About</a>
                        </li>
                        <li class="mb-1">
                            <a href="{{ route('about.faq.leagueoflegends') }}"
                               class="text-orange-400 hover:text-orange-500">FAQ: League of Legends</a>
                        </li>
                        <li class="mb-1">
                            <a href="{{ route('about.faq.heimerdinger') }}"
                               class="text-orange-400 hover:text-orange-500">FAQ: Heimerdinger</a>
                        </li>
                        <li class="mb-1">
                            <a href="{{ route('posts.index') }}"
                               class="text-orange-400 hover:text-orange-500">Blog Posts</a>
                        </li>
                        <li class="mb-1">
                            <a href="{{ route('contact.index') }}"
                               class="text-orange-400 hover:text-orange-500">Contact</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-stone-300">Champions</h2>
                    <ul class="mt-2">
                        @foreach ($champions as $champion)
                            <li class="mb-1">
                                <a href="{{ route('champions.show', $champion->slug) }}"
                                   class="text-orange-400 hover:text-orange-500">{{ $champion->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-stone-300">Blog Posts</h2>
                    <ul class="mt-2">
                        @foreach ($posts as $post)
                            <li class="mb-1">
                                <a href="{{ route('posts.show', $post->slug) }}"
                                   class="text-orange-400 hover:text-orange-500">{{ $post->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-stone-300">Skins</h2>
                    <ul class="mt-2">
                        @foreach ($skins as $skin)
                            <li class="mb-1">
                                <a href="{{ route('skins.show', $skin->slug) }}"
                                   class="text-orange-400 hover:text-orange-500">{{ $skin->skin_name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-stone-300">Icons</h2>
                    <ul class="mt-2">
                        @foreach ($icons as $icon)
                            <li class="mb-1">
                                <a href="{{ route('assets.icons.show', $icon->slug) }}"
                                   class="text-orange-400 hover:text-orange-500">{{ $icon->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
