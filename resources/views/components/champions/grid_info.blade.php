<section class="max-w-screen-xl mx-auto mt-12">
    <p class="sr-only">Heimerdinger Presents:</p>
    <h3
        class="text-sm font-bold text-center text-transparent uppercase sm:text-md
        bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text">
        CHAMPION DETAILS</h3>
    <h1
        class="text-3xl font-bold text-center text-transparent uppercase sm:text-4xl
        bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text">
        {{$champion->name}}</h1>
    <h2
        class="text-sm md:text-lg font-bold text-center text-transparent uppercase
        bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text">
        {{$champion->title}}</h2>

    <div class="container mx-auto p-4 flex items-center justify-center mt-3">
        <div class="w-screen grid grid-cols-1 md-grid-cols-2 lg:grid-cols-3 gap-5">
            <div
                class="relative rounded-2xl bg-stone-800/40 border border-neutral-300/5 shadow-sm shadow-stone-800/80 lg:col-span-2 ">
                <div class="aspect-w-16 aspect-h-9 glow-shadow absolute inset-0 rounded-2xl"
                     style="--splash-color: {{$champion->splash_color}}"></div>
                <div class="aspect-w-16 aspect-h-9 overflow-hidden rounded-2xl relative">
                    <img
                        src="//wsrv.nl/?url={{ $champion->getChampionImageAttribute(false) }}&w=880&output=webp&q=85"
                        alt="{{$champion->name}} Splash Art"
                        class="w-full h-full object-cover transform scale-100 transition-transform duration-700 hover:scale-105 z-10"
                    >
                </div>
            </div>

            <div
                class="rounded-2xl border border-3 border-white/10
                  lg:col-start-3 shadow-md transition-all duration-700"
                style="--tw-shadow-color:{{$champion->splash_color}}; --tw-shadow: var(--tw-shadow-colored); background-color: {{$champion->splash_color}};">

                <h4 class="text-center text-xl font-semibold text-neutral-100 uppercase mt-3.5 shadow-sm">
                    {{$champion->name}} Information</h4>

                <ul class="ml-7">

                    <li class="text-neutral-100 hyphens-auto text-base font-medium leading-loose mt-8" lang="en">
                        <span class="font-bold">Full Title:</span> {{$champion->name}}, {{$champion->title}}.
                    </li>
                    <li class="text-neutral-100 hyphens-auto text-base font-medium leading-loose" lang="en">
                        <span class="font-bold">Popular Positions:</span> @foreach($champion->lanes->roles as $lane)
                            <span
                                class="inline-block lowercase capitalize-first">{{$lane}} @svg(getRoleIconSvg($lane), 'w-5 h-5 inline-block')
                                @if(!$loop->last)
                                    -
                                @endif</span>
                        @endforeach
                    </li>
                    <li class="text-neutral-100 hyphens-auto text-base font-medium leading-loose items-center"
                        lang="en">
                        <span class="font-bold">Blue Essence Cost:</span>
                        <x-icon-lcu-be-svg class="inline-block w-4"/> {{$champion->price_be}} BE
                    </li>
                    <li class="text-neutral-100 hyphens-auto text-medium font-medium leading-loose items-center"
                        lang="en">
                        <span class="font-bold">Riot Points Cost:</span>
                        <x-icon-RiotPoints class="inline-block w-4"/> {{$champion->price_rp}} RP
                    </li>
                    <li class="text-neutral-100 hyphens-auto  leading-loose font-medium" lang="en">
                        <span class="font-bold">Roles:</span> @foreach($champion->roles as $role)
                            <span
                                class="inline-block lowercase capitalize-first">{{$role}}
                                @if(!$loop->last)
                                    -
                                @endif</span>
                        @endforeach
                    </li>
                    <li class="text-neutral-100 hyphens-auto  leading-loose font-medium" lang="en">
                        <span class="font-bold">Attack Type:</span> <span
                            class="inline-block lowercase capitalize-first">{{$champion->attack_type}}</span>
                    </li>
                    <li class="text-neutral-100 hyphens-auto leading-loose font-medium" lang="en">
                        <span class="font-bold">Damage Type:</span> {{$champion->adaptive_type}}
                    </li>
                    <li class="text-neutral-100 hyphens-auto  leading-loose font-medium" lang="en">
                        <span class="font-bold">Resource Type:</span> {{$champion->resource_type}}
                    </li>
                    <li class="text-neutral-100 hyphens-auto text-base font-medium leading-loose" lang="en">
                        <span class="font-bold">Champion ID:</span> <span
                            class="font-mono font-medium">{{$champion->champion_id}}</span>
                    </li>
                    <li class="text-neutral-100 hyphens-auto  leading-loose font-medium" lang="en">
                        <span class="font-bold">Release Date:</span> {{$champion->release_date}}
                    </li>
                    <li class="text-neutral-100 hyphens-auto  leading-loose font-medium" lang="en">
                        <span class="font-bold">Release Patch:</span> Patch {{$champion->release_patch}}
                    </li>
                </ul>
            </div>


            <div class="rounded-2xl border border-3 border-white/10 shadow-md
            shadow-stone-800/80 hover:shadow-orange-500/20 transition-all duration-700"
                 style="--tw-shadow-color:{{$champion->splash_color}}; --tw-shadow: var(--tw-shadow-colored); background-color: {{$champion->splash_color}};">
                <div class="p-4">
                    <h4 class="text-center text-xl font-semibold text-neutral-100 uppercase mt-2.5 shadow-sm">
                        {{$champion->name}} Lore</h4>
                    <p class="text-neutral-100 hyphens-auto text-base mt-2.5 leading-loose" lang="en">
                        {{$champion->lore}}
                    </p>
                </div>

            </div>
            <div
                class="rounded-2xl border border-3 border-white/10 shadow-md
                shadow-stone-800/80 lg:col-span-2 hover:shadow-orange-500/20 transition-all duration-700"
                style="--tw-shadow-color:{{$champion->splash_color}}; --tw-shadow: var(--tw-shadow-colored); background-color: {{$champion->splash_color}};">
                <div class="p-4">
                    <h4 class="text-center text-xl font-semibold text-neutral-100 uppercase mt-2.5 shadow-sm">
                        {{$champion->name}} Skins ({{count($champion->skins)}}) </h4>
                    <div class="overflow-x-scroll mt-2.5">
                        <div class="grid grid-flow-col grid-rows-2 w-max gap-4 mb-2.5">
                            @foreach($champion->skins as $key => $skin)
                                <div class="flex flex-col">
                                    <img
                                        src="//wsrv.nl/?url={{ $skin->getSkinImageAttribute() }}&w=450&output=webp&q=70"
                                        alt="{{$champion->name}} {{$skin->name}} Splash Art"
                                        @if($key < 6) loading="eager" @else loading="lazy" @endif
                                        class="inline-block h-36 object-cover rounded-2xl shadow-md border border-3 border-white/10
                                hover:shadow-orange-500/20 transition-all duration-700 mr-2.5">
                                    <p class="text-center text-neutral-100 text-sm mt-1.5">{{$skin->skin_name}}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
