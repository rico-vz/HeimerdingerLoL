<section class="max-w-screen-xl mx-auto mt-12">
    <p class="sr-only">Heimerdinger Presents:</p>
    <h3
        class="text-sm font-bold text-center text-transparent uppercase sm:text-md bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text">
        SKIN DETAILS</h3>
    <h1
        class="text-3xl font-bold text-center text-transparent uppercase sm:text-4xl bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text">
        {{$skin->skin_name}}</h1>
    <p class="text-sm font-medium text-center text-orange-400 uppercase transition-all duration-700 hover:underline decoration-1 decoration-transparent hover:decoration-orange-400">
        <a
            href="/champion/{{$skin->champion->slug}}">
            <span class="flex items-center justify-center">
            View
            champion
            info
                <x-iconsax-bul-arrow-square-right class="w-5"/>

                </span>
        </a>


    <div class="container flex items-center justify-center p-4 mx-auto mt-3">
        <div class="grid w-screen grid-cols-1 gap-5 md-grid-cols-2 lg:grid-cols-3">
            <div
                class="relative border shadow-sm rounded-2xl bg-stone-800/40 border-neutral-300/5 shadow-stone-800/80 lg:col-span-2">
                <div class="absolute inset-0 aspect-video glow-shadow rounded-2xl"
                     style="--splash-color: {{$skin->splash_color}}"></div>
                <img src="//wsrv.nl/?url={{ $skin->getSkinImageAttribute() }}&w=840&output=webp&q=70"
                     alt="{{$skin->skin_name}} Splash Art"
                     class="z-10 object-cover w-full h-full transition-transform duration-700 transform scale-100 rounded-2xl">

                <div class="absolute bottom-0 left-0 p-4">
                    <a href="{{ $skin->getSkinImageAttribute() }}" rel="noopener" target="_blank"
                       class="p-2 text-base font-bold text-white bg-black bg-opacity-50 rounded-xl">View in
                        HD</a>
                </div>
            </div>


            <div
                class="transition-all duration-700 border shadow-md rounded-2xl border-3 border-white/10 lg:col-start-3"
                style="--tw-shadow-color:{{$skin->splash_color}}; --tw-shadow: var(--tw-shadow-colored); background-color: {{$skin->splash_color}};">

                <h4 class="text-center text-lg font-semibold text-neutral-100 uppercase mt-3.5 shadow-sm mx-2">
                    {{$skin->skin_name}} Details</h4>

                <ul class="mx-5">
                    <li class="items-center mt-4 text-base font-medium leading-loose text-neutral-100 hyphens-auto"
                        lang="en">
                        <span class="font-bold">RP Cost:</span>
                        @if ($skin->rp_price == '99999')
                            Not Available for RP
                        @else
                            <x-icon-RiotPoints class="inline-block w-4"/>
                            {{ $skin->rp_price }} RP
                        @endif
                    </li>
                    <li class="items-center text-base font-medium leading-loose text-neutral-100 hyphens-auto"
                        lang="en">
                        <span class="font-bold">Release Date:</span> {{$skin->release_date}}
                    </li>
                    <li class="items-center text-base font-medium leading-loose text-neutral-100 hyphens-auto"
                        lang="en">
                        <span class="font-bold">Rarity:</span> {{$skin->rarity}}
                    </li>
                    <li class="items-center text-base font-medium leading-loose text-neutral-100 hyphens-auto"
                        lang="en">
                        <span class="font-bold">Availability:</span> {{$skin->availability}}
                    </li>
                    <li class="items-center text-base font-medium leading-loose text-neutral-100 hyphens-auto"
                        lang="en">
                        <span class="font-bold">Chromas:</span> @if ($skin->chromas->count() > 0)
                            {{$skin->chromas->count()}}
                        @else
                            None
                        @endif
                    </li>
                    <li class="items-center text-base font-medium leading-loose text-neutral-100 hyphens-auto"
                        lang="en">
                        <span class="font-bold">Lootable:</span> {{$skin->loot_eligible ? 'Yes' : 'No'}}
                    </li>
                    <li class="items-center text-base font-medium leading-loose text-neutral-100 hyphens-auto"
                        lang="en">
                        <span class="font-bold">New Effects:</span> {{$skin->new_effects ? 'Yes' : 'No'}}
                    </li>
                    <li class="items-center text-base font-medium leading-loose text-neutral-100 hyphens-auto"
                        lang="en">
                        <span class="font-bold">New Animations:</span> {{$skin->new_animations ? 'Yes' : 'No'}}
                    </li>
                    <li class="items-center text-base font-medium leading-loose text-neutral-100 hyphens-auto"
                        lang="en">
                        <span class="font-bold">New Recall:</span> {{$skin->new_recall ? 'Yes' : 'No'}}
                    </li>
                    <li class="items-center text-base font-medium leading-loose text-neutral-100 hyphens-auto"
                        lang="en">
                        <span class="font-bold">New Voice:</span> {{$skin->new_voice ? 'Yes' : 'No'}}
                    </li>
                    <li class="items-center text-base font-medium leading-loose text-neutral-100 hyphens-auto"
                        lang="en">
                        <span class="font-bold">New Quotes:</span> {{$skin->new_quotes ? 'Yes' : 'No'}}
                    </li>
                    <li class="items-center text-base font-medium leading-loose text-neutral-100 hyphens-auto"
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
                    <li class="items-center mb-4 text-base font-medium leading-loose text-neutral-100 hyphens-auto"
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


            <div class="transition-all duration-700 border shadow-md rounded-2xl border-3 border-white/10 shadow-stone-800/80 hover:shadow-orange-500/20"
                 style="--tw-shadow-color:{{$skin->splash_color}}; --tw-shadow: var(--tw-shadow-colored); background-color: {{$skin->splash_color}};">
                <div class="p-4">
                    <h4 class="text-center text-xl font-semibold text-neutral-100 uppercase mt-2.5 shadow-sm">
                        {{$skin->name}} Lore</h4>
                    <p class="text-neutral-100 hyphens-auto text-base mt-2.5 leading-loose" lang="en">
                        @if($skin->lore)
                            {!! $skin->lore !!}
                        @else
                            Heimerdinger has looked far and wide but could not find any lore for {{$skin->skin_name}}.
                            But we're sure it's a great skin! The things we do know is that it was released on
                            {{$skin->release_date}} and costs {{$skin->rp_price}} RP.
                        @endif
                    </p>
                </div>

            </div>
            <div
                class="transition-all duration-700 border shadow-md rounded-2xl border-3 border-white/10 shadow-stone-800/80 lg:col-span-2 hover:shadow-orange-500/20"
                style="--tw-shadow-color:{{$skin->splash_color}}; --tw-shadow: var(--tw-shadow-colored); background-color: {{$skin->splash_color}};">
                <div class="p-4">
                    <h4 class="text-center text-xl font-semibold text-neutral-100 uppercase mt-2.5 shadow-sm">
                        {{$skin->name}} Chromas ({{count($skin->chromas)}}) </h4>
                    <div id="skinsElement" class="overflow-x-scroll mt-2.5">
                        <div class="grid grid-flow-col grid-rows-2 w-max gap-4 mb-2.5">
                            @if(count($skin->chromas) < 1)
                                <p class="text-neutral-100 hyphens-auto text-base mt-2.5 leading-loose" lang="en">
                                    Sadly there are no chromas for {{$skin->skin_name}} yet.
                                </p>
                            @endif
                            @foreach($skin->chromas as $key => $chroma)
                                <div class="flex flex-col group">
                                    <a href="/skin/{{$skin->slug}}">
                                        <img
                                            src="//wsrv.nl/?url={{ $chroma->getChromaImageAttribute() }}&w=220&output=webp&q=70&il"
                                            alt="{{$chroma->chroma_name}} {{$chroma->skin_name}} ScreenShot"
                                            @if($key < 6) loading="eager" @else loading="lazy" @endif
                                            class="inline-block h-36 object-cover rounded-2xl shadow-md border border-3 border-white/10 hover:shadow-orange-500/20 transition-all duration-700 mr-2.5">
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
