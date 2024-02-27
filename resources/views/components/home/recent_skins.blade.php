@php use Carbon\Carbon; @endphp
<?php
/** @var App\Models\ChampionSkin $skin */
?>

<section class="text-white bg-stone-900">
    <div class="max-w-screen-xl px-4 py-8 mx-auto sm:py-12 sm:px-6 lg:py-16 lg:px-8">
        <div class="max-w-lg mx-auto text-center">
            <h2
                class="text-3xl font-bold text-transparent uppercase sm:text-4xl bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text">
                Recent Skins</h2>

            <p class="mt-4 text-stone-300">
                Check out the 6 most recent skins released in League of Legends. <br>
                <span class="text-sm text-stone-400">Data is updated roughly every 12 hours.</span>
            </p>
        </div>
        <div class="grid grid-cols-1 gap-4 mt-8 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3">
            @foreach ($latestSkins as $skin)
                @if ($loop->index < 6)
                    <div
                        class="p-8 transition border shadow-xl bg-stone-800/40 border-stone-800 rounded-xl hover:border-orange-500/10 hover:shadow-orange-500/10">
                        <div class="flex flex-col">
                            <div class="flex flex-col items-center justify-center">
                                <a href="{{ route('skins.show', $skin->slug) }}">
                                    <img loading="lazy" class="border-2 w-80 min-h-44 aspect-video border-orange-400/40 rounded-xl"
                                        src="//wsrv.nl/?url={{ $skin->getSkinImageAttribute() }}&w=640&output=webp&q=75&maxage=2d"
                                        alt="{{ $skin->skin_name }} Splash Art">
                                </a>
                                <div class="flex flex-col items-center justify-center">
                                    <h2 class="mt-4 text-xl font-bold text-white"><a
                                            href="{{ route('skins.show', $skin->slug) }}">{{ $skin->skin_name }}</a>
                                    </h2>
                                    <h3 class=" text-stone-200">Released
                                        {{ Carbon::parse($skin->release_date)->diffForHumans([
                                            'parts' => 2,
                                            'join' => true,
                                        ]) }}
                                    </h3>

                                    @foreach ($skin->associated_skinline as $skinline)
                                        <span class="sr-only">Associated Skinline:</span>
                                        <span
                                            class="my-2 bg-orange-100 text-orange-800 text-xs font-medium
                                            mr-2 px-2.5 py-0.5 rounded
                                            border border-orange-300
                                            ">
                                            {{ $skinline }}</span>
                                    @endforeach

                                    <p class="flex text-sm text-stone-300">
                                        @if ($skin->rp_price == '99999')
                                            Not Available for RP
                                        @else
                                            <x-icon-RiotPoints class="w-4 mr-1 text-yellow-400" />
                                            {{ $skin->rp_price }} RP
                                        @endif
                                    </p>

                                    @if ($skin->loot_eligible)
                                        <p class="flex items-center mt-1 text-sm italic text-stone-300">
                                            <x-icon-loot class="w-4 mr-1 text-yellow-200" />
                                            Can be obtained from loot
                                        </p>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach

        </div>

    </div>
</section>
