<?php
/** @var App\Models\SummonerEmote $emote */
?>

<section class="max-w-screen-xl mx-auto mt-12">
    <h1
        class="text-3xl font-bold text-center text-transparent uppercase sm:text-4xl bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text">
        Summoner Emotes</h1>

    <x-emotes.searchbar />

    <div class="container flex items-center justify-center p-4 mx-auto mt-3">
        <div class="grid grid-cols-2 gap-6 md:grid-cols-3 lg:grid-cols-6">

            @foreach ($emotes as $key => $emote)
                <div
                    class="flex flex-col items-center text-gray-700 border shadow-md champ-card bg-stone-800/40 rounded-2xl bg-clip-border border-stone-800 hover:border-orange-500/10 hover:shadow-orange-500/10">
                    <div
                        class="mx-4 mt-3 overflow-hidden border-2 h-36 w-36 rounded-2xl bg-clip-border border-orange-400/40">
                        <img @if ($key < 8) loading="eager" @else loading="lazy" @endif
                            src="//wsrv.nl/?url={{ $emote->image }}&w=200&output=webp&q=50&il&default=ssl:wsrv.nl%2F%3Furl%3Dhttps://i.ibb.co/5s6YyvN/aaaa.png"
                            class="object-cover w-full h-full" alt="{{ $emote->title }} Emote" />
                    </div>

                    <div class="px-4 py-2">
                        <div class="flex items-center justify-between">
                            <p class="block text-sm antialiased font-medium text-center text-gray-100">
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
