@php use Carbon\Carbon; @endphp
<?php
/** @var App\Models\ChampionSkin $skin */
?>

<section class="text-white bg-stone-900">
    <div class="max-w-screen-xl px-4 py-8 mx-auto sm:py-12 sm:px-6 lg:py-16 lg:px-8">
        <div class="max-w-lg mx-auto text-center">
            <h2
                class="text-3xl font-bold text-transparent uppercase sm:text-4xl bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text">
                Upcoming Skins</h2>

            <p class="mt-4 text-stone-300">
                Check out upcoming skins in League of Legends. <br>
                <span class="text-sm text-stone-400">Data is sourced from the <a
                        class="underline transition-all duration-700 decoration-1 decoration-orange-400/50 hover:decoration-orange-400"
                        href="https://wiki.leagueoflegends.com/en-us/" target="_blank">LoL
                        Wiki</a>, ran by volunteers.</span><br>
                <span class="text-sm text-stone-400">We cannot guarantee its real-time accuracy.</span>
            </p>
        </div>
        <div class="grid grid-cols-1 gap-4 mt-8 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3">
            @foreach ($upcomingSkins as $skin)
                <div
                    class="p-8 transition border shadow-xl bg-stone-800/40 border-stone-800 rounded-xl hover:border-orange-500/10 hover:shadow-orange-500/10">
                    <div class="flex flex-col">
                        <div class="flex flex-col items-center justify-center">
                            <a href="{{ route('skins.show', $skin->slug) }}">
                                <img loading="lazy" class="h-full border-2 w-80 border-orange-400/40 rounded-xl"
                                    src="//wsrv.nl/?url={{ $skin->getSkinImageAttribute() }}&w=480&output=webp&q=75&maxage=2d"
                                    alt="{{ $skin->skin_name }} Splash Art">
                            </a>
                            <div class="flex flex-col items-center justify-center">
                                <h2 class="mt-4 text-xl font-bold text-white"><a
                                        href="{{ route('skins.show', $skin->slug) }}">{{ $skin->skin_name }}</a></h2>

                                <div class="my-1">
                                    <span class="sr-only">Associated Skinline:</span>
                                    @foreach ($skin->associated_skinline as $skinline)
                                        <span
                                            class="bg-orange-100 text-orange-800 text-xs font-medium
                                            @if (!$loop->last) mr-2 @endif px-2.5  rounded
                                            border border-orange-300
                                            ">
                                            {{ $skinline }}</span>
                                    @endforeach
                                </div>

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
            @endforeach
        </div>
    </div>
</section>
