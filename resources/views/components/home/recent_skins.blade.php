@php use Carbon\Carbon; @endphp
<?php /** @var App\Models\ChampionSkin $skin */ ?>

<section class="text-white bg-stone-900">
    <div class="max-w-screen-xl px-4 py-8 mx-auto sm:py-12 sm:px-6 lg:py-16 lg:px-8">
        <div class="max-w-lg mx-auto text-center">
            <h2
                class="text-3xl font-bold text-transparent uppercase sm:text-4xl bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text">
                Recent Skins</h2>

            <p class="mt-4 text-stone-300">
                Check out the 9 most recent skins released in League of Legends. <br>
                <span class="text-sm text-stone-400">Data is updated roughly every 12 hours.</span>
            </p>
        </div>
        <div class="grid grid-cols-1 gap-4 mt-8 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3">
            @foreach ($latestSkins as $skin)
                @if ($loop->index < 9)
                    <div
                        class="p-8 transition border shadow-xl border-stone-800 rounded-xl hover:border-orange-500/10 hover:shadow-orange-500/10">
                        <div class="flex flex-col">
                            <div class="flex flex-col items-center justify-center">
                                <img loading="lazy" class="border-2 border-orange-400/40 rounded-xl"
                                    src="{{ $skin->getSkinImageAttribute() }}" alt="{{ $skin->skin_name }} Splash Art">
                                <div class="flex flex-col items-center justify-center">
                                    <h2 class="mt-4 text-xl font-bold text-white">{{ $skin->skin_name }}</h2>
                                    <h3 class=" text-stone-200">Released
                                        {{ Carbon::parse($skin->release_date)->diffForHumans([
                                            'parts' => 2,
                                            'join' => true,
                                        ]) }}
                                    </h3>
                                    <p class="mt-1 text-sm text-stone-300">
                                        @if ($skin->rp_price == '99999')
                                            Not Available for RP
                                        @else
                                            {{ $skin->rp_price }} RP
                                        @endif

                                    </p>
                                    <p class="mt-1 text-sm italic text-stone-300">
                                        @if ($skin->loot_eligible)
                                            Can be obtained from loot
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach

        </div>

    </div>
</section>
