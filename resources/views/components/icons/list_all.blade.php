<?php
/** @var App\Models\SummonerIcon $icon */
?>

<section class="max-w-screen-xl mx-auto mt-12">
    <h1
        class="text-3xl font-bold text-center text-transparent uppercase sm:text-4xl bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text">
        Summoner Icons</h1>
    <x-icons.searchbar />
    <div class="container flex items-center justify-center p-4 mx-auto mt-3">

        <div class="grid grid-cols-2 gap-12 md:grid-cols-3 lg:grid-cols-6">

            @foreach ($icons as $key => $icon)
                <div
                    class="flex flex-col items-center text-gray-700 border shadow-md champ-card bg-stone-800/40 rounded-2xl bg-clip-border border-stone-800 hover:border-orange-500/10 hover:shadow-orange-500/10">
                    <div
                        class="w-24 h-24 mx-4 mt-3 overflow-hidden border-2 rounded-2xl bg-clip-border border-orange-400/40">
                        <a href="/icon/{{ $icon->slug }}">
                            <img @if ($key < 8) loading="eager" @else loading="lazy" @endif
                                src="//wsrv.nl/?url={{ $icon->image }}&w=200&output=webp&q=50&il&default=ssl:wsrv.nl%2F%3Furl%3Dhttps://i.ibb.co/5s6YyvN/aaaa.png"
                                class="object-cover w-full h-full" alt="{{ $icon->title }} Icon" /></a>
                    </div>

                    <div class="px-4 py-2">
                        <div class="flex items-center justify-between">
                            <p class="block text-sm antialiased font-medium text-center text-gray-100">
                                <a href="/icon/{{ $icon->slug }}">
                                    {{ $icon->title }}
                                </a>
                            </p>

                        </div>
                    </div>

                    <div class="flex items-end justify-center px-4 mt-auto mb-2 text-2xl text-white md:text-lg">
                        <p class="text-sm font-medium hover:text-orange-400"><a href="/icon/{{ $icon->slug }}">More
                                details
                                <x-iconsax-bul-arrow-circle-right class="inline-block w-6" />
                            </a>
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {{ $icons->links() }}
</section>
