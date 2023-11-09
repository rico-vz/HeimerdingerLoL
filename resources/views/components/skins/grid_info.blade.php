<section class="max-w-screen-xl mx-auto mt-12">
    <p class="sr-only">Heimerdinger Presents:</p>
    <h3
        class="text-sm font-bold text-center text-transparent uppercase sm:text-md
        bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text">
        SKIN DETAILS</h3>
    <h1
        class="text-3xl font-bold text-center text-transparent uppercase sm:text-4xl
        bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text">
        {{$skin->skin_name}}</h1>


    <div class="container mx-auto p-4 flex items-center justify-center mt-3">
        <div class="w-screen grid grid-cols-1 md-grid-cols-2 lg:grid-cols-3 gap-5">
            <div
                class="relative rounded-2xl bg-stone-800/40 border border-neutral-300/5 shadow-sm shadow-stone-800/80 lg:col-span-2 ">
                <div class="aspect-w-16 aspect-h-9 glow-shadow absolute inset-0 rounded-2xl"
                     style="--splash-color: {{$skin->splash_color}}"></div>
                <div class="aspect-w-16 aspect-h-9 overflow-hidden rounded-2xl relative">
                    <img
                        src="//wsrv.nl/?url={{ $skin->getSkinImageAttribute() }}&w=880&output=webp&q=85&il"
                        alt="{{$skin->skin_name}} Splash Art"
                        class="w-full h-full object-cover transform scale-100 transition-transform duration-700 hover:scale-105 z-10"
                    >
                </div>
            </div>

            <div
                class="rounded-2xl border border-3 border-white/10
                  lg:col-start-3 shadow-md transition-all duration-700"
                style="--tw-shadow-color:{{$skin->splash_color}}; --tw-shadow: var(--tw-shadow-colored); background-color: {{$skin->splash_color}};">

                <h4 class="text-center text-lg font-semibold text-neutral-100 uppercase mt-3.5 shadow-sm mx-2">
                    {{$skin->skin_name}} Details</h4>

                <ul class="ml-7 ">
                    <li class="text-neutral-100 hyphens-auto text-base font-medium leading-loose items-center mt-8"
                        lang="en">
                        <span class="font-bold">Riot Points Cost:</span>
                        @if ($skin->rp_price == '99999')
                            Not Available for RP
                        @else
                            <x-icon-RiotPoints class="inline-block w-4"/>
                            {{ $skin->rp_price }} RP
                        @endif
                    </li>
                    <li class="text-neutral-100 hyphens-auto text-base font-medium leading-loose items-center"
                        lang="en">
                        <span class="font-bold">Release Date:</span> {{$skin->release_date}}
                    </li>
                    <li class="text-neutral-100 hyphens-auto text-base font-medium leading-loose items-center"
                        lang="en">
                        <span class="font-bold">Rarity:</span> {{$skin->rarity}}
                    </li>
                    <li class="text-neutral-100 hyphens-auto text-base font-medium leading-loose items-center"
                        lang="en">
                        <span class="font-bold">Availability:</span> {{$skin->availability}}
                    </li>
                    <li class="text-neutral-100 hyphens-auto text-base font-medium leading-loose items-center"
                        lang="en">
                        <span class="font-bold">Chromas:</span> @if ($skin->chromas->count() > 0)
                            {{$skin->chromas->count()}}
                        @else
                            None
                        @endif
                    </li>
                    <li class="text-neutral-100 hyphens-auto text-base font-medium leading-loose items-center"
                        lang="en">
                        <span class="font-bold">Lootable:</span> {{$skin->loot_eligible ? 'Yes' : 'No'}}
                    </li>
                    <li class="text-neutral-100 hyphens-auto text-base font-medium leading-loose items-center"
                        lang="en">
                        <span class="font-bold">New Effects:</span> {{$skin->new_effects ? 'Yes' : 'No'}}
                    </li>
                    <li class="text-neutral-100 hyphens-auto text-base font-medium leading-loose items-center"
                        lang="en">
                        <span class="font-bold">New Animations:</span> {{$skin->new_animations ? 'Yes' : 'No'}}
                    </li>
                    <li class="text-neutral-100 hyphens-auto text-base font-medium leading-loose items-center"
                        lang="en">
                        <span class="font-bold">New Recall:</span> {{$skin->new_recall ? 'Yes' : 'No'}}
                    </li>
                    <li class="text-neutral-100 hyphens-auto text-base font-medium leading-loose items-center"
                        lang="en">
                        <span class="font-bold">New Voice:</span> {{$skin->new_voice ? 'Yes' : 'No'}}
                    </li>
                    <li class="text-neutral-100 hyphens-auto text-base font-medium leading-loose items-center"
                        lang="en">
                        <span class="font-bold">New Quotes:</span> {{$skin->new_quotes ? 'Yes' : 'No'}}
                    </li>
                    <li class="text-neutral-100 hyphens-auto text-base font-medium leading-loose items-center"
                        lang="en">
                        <span class="font-bold">Voice Actor:</span>
                        @if(count($skin->voice_actor) < 1)
                            Unknown
                        @else
                            @foreach($skin->voice_actor as $voice_actor)
                                {{ $voice_actor }}
                            @endforeach
                        @endif
                    </li>
                    <li class="text-neutral-100 hyphens-auto text-base font-medium leading-loose items-center"
                        lang="en">
                        <span class="font-bold">Splash Artist:</span>
                        @if(count($skin->splash_artist) < 1)
                            Unknown
                        @else
                            @foreach($skin->splash_artist as $key => $splash_artist)
                                {{ $splash_artist }}
                                @if($key < count($skin->splash_artist) - 2)
                                    ,
                                @elseif($key == count($skin->splash_artist) - 2)
                                    &amp;
                                @endif
                            @endforeach
                        @endif
                    </li>


                </ul>
            </div>


            <div class="rounded-2xl border border-3 border-white/10 shadow-md
            shadow-stone-800/80 hover:shadow-orange-500/20 transition-all duration-700"
                 style="--tw-shadow-color:{{$skin->splash_color}}; --tw-shadow: var(--tw-shadow-colored); background-color: {{$skin->splash_color}};">
                <div class="p-4">
                    <h4 class="text-center text-xl font-semibold text-neutral-100 uppercase mt-2.5 shadow-sm">
                        {{$skin->name}} Lore</h4>
                    <p class="text-neutral-100 hyphens-auto text-base mt-2.5 leading-loose" lang="en">
                        {{$skin->lore}}
                    </p>
                </div>

            </div>
            <div
                class="rounded-2xl border border-3 border-white/10 shadow-md
                shadow-stone-800/80 lg:col-span-2 hover:shadow-orange-500/20 transition-all duration-700"
                style="--tw-shadow-color:{{$skin->splash_color}}; --tw-shadow: var(--tw-shadow-colored); background-color: {{$skin->splash_color}};">
                <div class="p-4">
                    <h4 class="text-center text-xl font-semibold text-neutral-100 uppercase mt-2.5 shadow-sm">
                        {{$skin->name}} Chromas ({{count($skin->chromas)}}) </h4>
                    <div id="skinsElement" class="overflow-x-scroll mt-2.5">
                        <div class="grid grid-flow-col grid-rows-2 w-max gap-4 mb-2.5">
                            @foreach($skin->chromas as $key => $chroma)
                                <div class="group flex flex-col ">
                                    <a href="/skin/{{$skin->slug}}">
                                        <img
                                            src="//wsrv.nl/?url={{ $chroma->getChromaImageAttribute() }}&w=220&output=webp&q=70&il"
                                            alt="{{$chroma->chroma_name}} {{$chroma->skin_name}} ScreenShot"
                                            @if($key < 6) loading="eager" @else loading="lazy" @endif
                                            class=" inline-block h-36 object-cover rounded-2xl shadow-md border border-3 border-white/10
                                hover:shadow-orange-500/20 transition-all duration-700 mr-2.5">
                                    </a>
                                    <div>

                                        <p class="align-bottom text-center text-neutral-100 text-sm mt-1.5 items-center">
                                            <span
                                                class="hover:text-orange-400 group-hover:text-orange-400">
                                                {{$chroma->chroma_name}}
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
