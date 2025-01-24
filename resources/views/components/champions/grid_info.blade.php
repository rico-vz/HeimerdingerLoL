<section class="max-w-screen-xl mx-auto mt-12">
    <p class="sr-only">Heimerdinger Presents:</p>
    <h3
        class="text-sm font-bold text-center text-transparent uppercase sm:text-md bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text">
        CHAMPION DETAILS</h3>
    <h1
        class="text-3xl font-bold text-center text-transparent uppercase sm:text-4xl bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text">
        {{ $champion->name }}</h1>
    <h2
        class="text-sm font-bold text-center text-transparent uppercase md:text-lg bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text">
        {{ $champion->title }}</h2>

    <div class="container flex items-center justify-center p-4 mx-auto mt-3">
        <div class="grid w-screen grid-cols-1 gap-5 md-grid-cols-2 lg:grid-cols-3">
            <div
                class="relative border shadow-sm aspect-video rounded-2xl bg-stone-800/40 border-neutral-300/5 shadow-stone-800/80 lg:col-span-2">
                <div class="absolute inset-0 aspect-video glow-shadow rounded-2xl"
                    style="--splash-color: {{ $champion->splash_color }}"></div>
                <div class="relative overflow-hidden aspect-video rounded-2xl">
                    <img src="//wsrv.nl/?url={{ $champion->getChampionImageAttribute(true) }}&w=880&output=webp&q=85&il"
                        alt="{{ $champion->name }} Splash Art"
                        class="z-10 object-cover w-full h-full transition-transform duration-700 transform scale-100 hover:scale-105">
                </div>
            </div>

            <div class="transition-all duration-700 border shadow-md rounded-2xl border-3 border-white/10 lg:col-start-3"
                style="--tw-shadow-color:{{ $champion->splash_color }}; --tw-shadow: var(--tw-shadow-colored); background-color: {{ $champion->splash_color }};">

                <h4 class="text-center text-xl font-semibold text-neutral-100 uppercase mt-3.5 shadow-sm">
                    {{ $champion->name }} Information</h4>

                <ul class="ml-7">
                    <li class="mt-8 text-base font-medium leading-loose text-neutral-100 hyphens-auto" lang="en">
                        <span class="font-bold">Full Title:</span> {{ $champion->name }}, {{ $champion->title }}.
                    </li>
                    <li class="text-base font-medium leading-loose text-neutral-100 hyphens-auto" lang="en">
                        <span class="font-bold">Popular Positions:</span>
                        @if (isset($champion->lanes) && isset($champion->lanes->roles))
                            @foreach ($champion->lanes->roles as $lane)
                                <span class="inline-block lowercase capitalize-first">{{ $lane }} @svg(getRoleIconSvg($lane), 'w-5 h-5 inline-block')
                                    @if (!$loop->last)
                                        -
                                    @endif
                                </span>
                            @endforeach
                        @else
                            <span class="inline-block lowercase capitalize-first">Not Enough Data</span>
                        @endif
                    </li>
                    <li class="items-center text-base font-medium leading-loose text-neutral-100 hyphens-auto"
                        lang="en">
                        <span class="font-bold">Blue Essence Cost:</span>
                        <x-icon-lcu-be-svg class="inline-block w-4" /> {{ $champion->price_be }} BE
                    </li>
                    <li class="items-center font-medium leading-loose text-neutral-100 hyphens-auto text-medium"
                        lang="en">
                        <span class="font-bold">Riot Points Cost:</span>
                        <x-icon-RiotPoints class="inline-block w-4" /> {{ $champion->price_rp }} RP
                    </li>
                    <li class="font-medium leading-loose text-neutral-100 hyphens-auto" lang="en">
                        <span class="font-bold">Roles:</span>
                        @foreach ($champion->roles as $role)
                            <span class="inline-block lowercase capitalize-first">{{ $role }}
                                @if (!$loop->last)
                                    -
                                @endif
                            </span>
                        @endforeach
                    </li>
                    <li class="font-medium leading-loose text-neutral-100 hyphens-auto" lang="en">
                        <span class="font-bold">Attack Type:</span> <span
                            class="inline-block lowercase capitalize-first">{{ $champion->attack_type }}</span>
                    </li>
                    <li class="font-medium leading-loose text-neutral-100 hyphens-auto" lang="en">
                        <span class="font-bold">Damage Type:</span> {{ $champion->adaptive_type }}
                    </li>
                    <li class="font-medium leading-loose text-neutral-100 hyphens-auto" lang="en">
                        <span class="font-bold">Resource Type:</span> {{ $champion->resource_type }}
                    </li>
                    <li class="text-base font-medium leading-loose text-neutral-100 hyphens-auto" lang="en">
                        <span class="font-bold">Champion ID:</span> <span
                            class="font-mono font-medium">{{ $champion->champion_id }}</span>
                    </li>
                    <li class="font-medium leading-loose text-neutral-100 hyphens-auto" lang="en">
                        <span class="font-bold">Release Date:</span> {{ $champion->release_date }}
                    </li>
                    <li class="font-medium leading-loose text-neutral-100 hyphens-auto" lang="en">
                        <span class="font-bold">Release Patch:</span> Patch {{ $champion->release_patch }}
                    </li>
                </ul>
            </div>
            <div class="transition-all duration-700 border shadow-md rounded-2xl border-3 border-white/10 shadow-stone-800/80 hover:shadow-orange-500/20"
                style="--tw-shadow-color:{{ $champion->splash_color }}; --tw-shadow: var(--tw-shadow-colored); background-color: {{ $champion->splash_color }};">
                <div class="p-4">
                    <h4 class="text-center text-xl font-semibold text-neutral-100 uppercase mt-2.5 shadow-sm">
                        {{ $champion->name }} Streamers</h4>
                    <p class="text-neutral-100/75 hyphens-auto mt-2.5 leading-loose text-center text-sm" lang="en">
                        A list of streamers who play {{ $champion->name }} and are atleast Diamond 2 or higher.
                    </p>
                    <div class="grid grid-cols-1 gap-4 mt-2.5 lg:grid-cols-2">
                        @foreach ($streamers as $streamer)
                            <div class="flex justify-center items -center">
                                <div class="flex flex-col items-center justify-center">
                                    <a href="{{ $streamer->streamer_url }}" target="_blank" rel="noopener noreferrer"
                                        class="text-center text-neutral-100 text-sm mt-1.5 items-center drop-shadow-lg text-shadow-{{ strtolower($streamer->platform) }}">
                                        {{ $streamer->displayname }}
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="transition-all duration-700 border shadow-md rounded-2xl border-3 border-white/10 shadow-stone-800/80 lg:col-span-2 hover:shadow-orange-500/20"
                style="--tw-shadow-color:{{ $champion->splash_color }}; --tw-shadow: var(--tw-shadow-colored); background-color: {{ $champion->splash_color }};">
                <div class="p-4">
                    <h4 class="text-center text-xl font-semibold text-neutral-100 uppercase mt-2.5 shadow-sm">
                        {{ $champion->name }} Skins ({{ count($champion->skins) }}) </h4>
                    <div id="skinsElement" class="overflow-x-scroll mt-2.5">
                        <div class="grid grid-flow-col grid-rows-2 w-max gap-4 mb-2.5">
                            @foreach ($champion->skins as $key => $skin)
                                <div class="flex flex-col group">
                                    <a href="/skin/{{ $skin->slug }}">
                                        <img src="//wsrv.nl/?url={{ $skin->getSkinImageAttribute(true) }}&w=450&output=webp&q=70&il"
                                            alt="{{ $champion->name }} {{ $skin->name }} Splash Art"
                                            @if ($key < 6) loading="eager" @else loading="lazy" @endif
                                            class="inline-block h-36 object-cover rounded-2xl shadow-md border border-3 border-white/10 hover:shadow-orange-500/20 transition-all duration-700 mr-2.5">
                                    </a>
                                    <div>
                                        <p
                                            class="align-bottom text-center text-neutral-100 text-sm mt-1.5 items-center">
                                            <a href="/skin/{{ $skin->slug }}"
                                                class="hover:text-orange-400 group-hover:text-orange-400">
                                                {{ $skin->skin_name }}
                                                <x-iconsax-bul-arrow-right class="inline-block w-5" />
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>



            <div class="transition-all duration-700 border shadow-md lg:col-span-3 rounded-2xl border-3 border-white/10 shadow-stone-800/80 hover:shadow-orange-500/20"
                style="--tw-shadow-color:{{ $champion->splash_color }}; --tw-shadow: var(--tw-shadow-colored); background-color: {{ $champion->splash_color }};">
                <div class="p-4">
                    <h4 class="text-center text-xl font-semibold text-neutral-100 uppercase mt-2.5 shadow-sm">
                        {{ $champion->name }} Lore</h4>
                    <p class="text-neutral-100 hyphens-auto text-base mt-2.5 leading-loose w-9/12 mx-auto"
                        lang="en">
                        {{ $champion->lore }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@push('top_scripts')
    @vite('resources/js/lane-filter.js')
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4505764048662657"
        crossorigin="anonymous"></script>
@endpush
@push('bottom_scripts')
    @include('popper::assets')
@endpush
