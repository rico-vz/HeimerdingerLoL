<?php
/** @var App\Models\Champion $champion */

/** @var App\Models\ChampionRoles $lanes */ ?>


<section class="max-w-screen-xl mx-auto mt-12">
    <h2
        class="text-3xl font-bold text-center  text-transparent uppercase sm:text-4xl
        bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text">
        Champions</h2>

    <div class="container mx-auto p-4 flex items-center justify-center mt-3">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
            @foreach($champions as $champion)
                <div
                    class="flex flex-col text-gray-700 bg-stone-800/40 shadow-md rounded-2xl bg-clip-border
                    border border-stone-800 hover:border-orange-500/10 hover:shadow-orange-500/10">
                    <div
                        class="mx-4 mt-4 overflow-hidden h-52 rounded-2xl bg-clip-border border-2 border-orange-400/40">
                        <img loading="lazy"
                             src="//wsrv.nl/?url={{ $champion->getChampionImageAttribute() }}&w=400&output=webp&q=70"
                             class="object-cover w-full h-full"
                             alt="{{ $champion->name }} Splash Art"
                        />
                    </div>
                    <div class="px-4 py-2">
                        <div class="flex items-center justify-between">
                            <p class="block text-base antialiased font-medium  text-gray-100">
                                {{ $champion->name }}
                            </p>
                            <span class="text-xsm text-stone-300">{{ $champion->title }}</span>
                        </div>

                        <div class="flex items-center justify-between mt-2">
                            <p class="text-gray-300 text-sm flex">
                                @foreach($champion->lanes->roles as $lane)
                                    <span class="sr-only">{{$lane}}</span>

                                    <img data-tooltip-target="tooltip-bottom-{{$lane}}" data-tooltip-placement="bottom"
                                         loading="lazy" src="{{$champion->lanes->getRoleIcon($lane)}}"
                                         alt="{{$lane}} Icon"
                                         class="w-7 h-7 mr-1">
                            </p>
                            @endforeach

                            <div id="tooltip-bottom-{{$lane}}" role="tooltip"
                                 class="z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white
                                 rounded-lg shadow-sm transition-opacity opacity-0 tooltip bg-stone-700">
                                {{$lane}}
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>

                            <p class="text-right text-2xl md:text-lg text-orange-300 hover:text-orange-400">
                                <a href="/champion/{{$champion->slug}}">
                                    <i class="fa-duotone fa-arrow-up-right-from-square"></i>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
