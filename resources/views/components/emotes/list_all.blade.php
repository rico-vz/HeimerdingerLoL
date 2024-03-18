<?php
/** @var App\Models\SummonerEmote $emote */ ?>

<section class="max-w-screen-xl mx-auto mt-12">
    <h1
        class="text-3xl font-bold text-center text-transparent uppercase sm:text-4xl bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text">
        Summoner Emotes</h1>

    <x-emotes.searchbar/>

    <div class="container mx-auto p-4 flex items-center justify-center mt-3">
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">

            @foreach($emotes as $key => $emote)
                <div
                    class="champ-card flex flex-col text-gray-700 bg-stone-800/40 shadow-md rounded-2xl bg-clip-border border border-stone-800 hover:border-orange-500/10 hover:shadow-orange-500/10 items-center">
                    <div
                        class="mx-4 overflow-hidden h-36 w-36 rounded-2xl bg-clip-border border-2 border-orange-400/40 mt-3">
                        <img @if($key < 8) loading="eager" @else loading="lazy" @endif
                        src="//wsrv.nl/?url={{ $emote->image }}&w=200&output=webp&q=50&il&default=ssl:wsrv.nl%2F%3Furl%3Dhttps://i.ibb.co/5s6YyvN/aaaa.png"
                             class="object-cover w-full h-full"
                             alt="{{ $emote->title }} Emote"
                        />
                    </div>

                    <div class="px-4 py-2">
                        <div class="flex items-center justify-between">
                            <p class="block text-sm antialiased font-medium text-gray-100 text-center">
                                {{ $emote->title }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {{ $emotes->links() }}
</section>
