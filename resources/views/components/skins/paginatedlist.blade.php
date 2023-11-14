<?php
/** @var App\Models\ChampionSkin $skin */ ?>

<section class="max-w-screen-xl mx-auto mt-12">
    <h2
        class="text-3xl font-bold text-center text-transparent uppercase sm:text-4xl
        bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text">
        Champion Skins</h2>
    <x-skins.searchbar/>

    <div class="flex justify-center items-center mx-auto max-w-screen-xl mt-2.5">
    </div>

    <div class="container mx-auto p-4 flex items-center justify-center mt-3">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 ">

            @foreach($skins as $key => $skin)
                <div
                    class="champ-card flex flex-col text-gray-700 bg-stone-800/40 shadow-md rounded-2xl bg-clip-border
                    border border-stone-800 hover:border-orange-500/10 hover:shadow-orange-500/10">

                    @if($skin->associated_skinline != null)
                        <div class="px-2 flex justify-center">
                            @foreach($skin->associated_skinline as $skinline)
                                <span class="sr-only">Associated Skinline:</span>
                                <span
                                    class="m-2 bg-orange-100 text-orange-800 text-xs font-medium
                                            mr-2 px-2.5 py-0.5 rounded
                                            border border-orange-300
                                            ">
                                            {{$skinline}}</span>
                            @endforeach
                        </div>
                    @endif
                    <div
                        class="mx-4 overflow-hidden h-52 rounded-2xl bg-clip-border border-2 border-orange-400/40">
                        <img @if($key < 8) loading="eager" @else loading="lazy" @endif
                        src="//wsrv.nl/?url={{ $skin->getSkinImageAttribute() }}&w=540&output=webp&q=70&il"
                             class="object-cover w-full h-full"
                             alt="{{ $skin->skin_name }} Splash Art"
                        />
                    </div>

                    <div class="px-4 py-2">
                        <div class="flex items-center justify-between">
                            <p class="block text-base antialiased font-medium text-gray-100">
                                {{ $skin->skin_name }}
                            </p>
                            <span class="text-xs font-bold  {{ $rarityColor[$skin->rarity] }}">{{$skin->rarity}}</span>

                        </div>
                    </div>

                    <div
                        class="mb-2 px-4 flex justify-center items-end text-white text-2xl md:text-lg mt-auto">
                        <p class="font-medium text-sm hover:text-orange-400 "><a
                                href="/skin/{{$skin->slug}}">More details
                                <x-iconsax-bul-arrow-circle-right class="inline-block w-6"/>
                            </a>
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {{ $skins->links() }}

</section>
