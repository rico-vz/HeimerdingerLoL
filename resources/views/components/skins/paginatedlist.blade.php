<?php
/** @var App\Models\ChampionSkin $skin */

?>
<section class="max-w-screen-xl mx-auto mt-12">
    <h2
        class="text-3xl font-bold text-center text-transparent uppercase sm:text-4xl
        bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text">
        Skins</h2>
    <div class="flex justify-center items-center mx-auto max-w-screen-xl mt-2.5">
    </div>

    <div class="container mx-auto p-4 flex items-center justify-center mt-3">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 ">

            @foreach($skins as $key => $skin)
                <div
                    class="champ-card flex flex-col text-gray-700 bg-stone-800/40 shadow-md rounded-2xl bg-clip-border
                    border border-stone-800 hover:border-orange-500/10 hover:shadow-orange-500/10">
                    <div
                        class="mx-4 mt-4 overflow-hidden h-52 rounded-2xl bg-clip-border border-2 border-orange-400/40">
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
                            <span class="text-xs text-stone-300">{{$skin->rarity}}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {{ $skins->links() }}

</section>
