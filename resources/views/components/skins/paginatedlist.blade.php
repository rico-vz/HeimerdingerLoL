<?php
/** @var App\Models\ChampionSkin $skin */
?>

<section class="max-w-screen-xl mx-auto mt-12">
    <h1
        class="text-3xl font-bold text-center text-transparent uppercase sm:text-4xl bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text">
        Champion Skins</h1>
    <x-skins.searchbar />

    <div class="flex justify-center my-4">
        <x-ads.horizontal-banner />
    </div>

    @fragment('skin-list')
        <div id="skin-list">
            <div class="container flex items-center justify-center p-4 mx-auto mt-3">
                <div class="grid grid-cols-1 gap-12 md:grid-cols-2 lg:grid-cols-4">
                    @foreach ($skins as $key => $skin)
                        <div
                            class="flex flex-col text-gray-700 border shadow-md champ-card bg-stone-800/40 rounded-2xl bg-clip-border border-stone-800 hover:border-orange-500/10 hover:shadow-orange-500/10">

                            @if ($skin->associated_skinline != null)
                                <div class="flex justify-center px-2">
                                    @foreach ($skin->associated_skinline as $skinline)
                                        <span
                                            class="m-2 bg-orange-100 text-orange-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded border border-orange-300">
                                            {{ $skinline }}</span>
                                    @endforeach
                                </div>
                            @endif
                            <div class="mx-4 overflow-hidden border-2 h-52 rounded-2xl bg-clip-border border-orange-400/40">
                                <a href="/skin/{{ $skin->slug }}">
                                    <img @if ($key < 8) loading="eager" @else loading="lazy" @endif
                                        src="//wsrv.nl/?url={{ $skin->getSkinImageAttribute() }}&w=540&output=webp&q=70&il"
                                        class="object-cover w-full h-full" alt="{{ $skin->skin_name }} Splash Art" />
                                </a>
                            </div>

                            <div class="px-4 py-2">
                                <div class="flex items-center justify-between">
                                    <p class="block text-base antialiased font-medium text-gray-100">
                                        <a href="/skin/{{ $skin->slug }}">
                                            {{ $skin->skin_name }}
                                        </a>
                                    </p>
                                    <span
                                        class="text-xs font-bold  {{ $rarityColor[$skin->rarity] }}">{{ $skin->rarity }}</span>

                                </div>
                            </div>

                            <div class="flex items-end justify-center px-4 mt-auto mb-2 text-2xl text-white md:text-lg">
                                <p class="text-sm font-medium hover:text-orange-400"><a
                                        href="/skin/{{ $skin->slug }}">More
                                        details
                                        <x-iconsax-bul-arrow-circle-right class="inline-block w-6" />
                                    </a>
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            {{ $skins->links() }}
        </div>
    @endfragment

</section>
