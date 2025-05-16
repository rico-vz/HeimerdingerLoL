<section class="max-w-screen-xl mx-auto mt-12">
    <h3
        class="text-sm font-bold text-center text-transparent uppercase sm:text-md bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text">
        Champion Spotlight
    </h3>
    <h1
        class="text-3xl font-bold text-center text-transparent uppercase sm:text-4xl bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text">
        {{ $champion->name }}
    </h1>
    <h2
        class="text-sm font-bold text-center text-transparent uppercase md:text-lg bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text">
        {{ $champion->title }}
    </h2>

    <x-ads.common />

    <!-- Hero Section with Splash Art -->
    <div class="container mx-auto mt-8">
        <div class="relative overflow-hidden border shadow-sm rounded-2xl bg-stone-800/40 border-neutral-300/5 shadow-stone-800/80"
            style="height: 350px;">
            <div class="absolute inset-0 glow-shadow rounded-2xl"></div>

            <div class="relative w-full" style="aspect-ratio: 1278/348;">
                <img src="//wsrv.nl/?url={{ $champion->getChampionImageAttribute(true) }}&w=30&h=8&fit=cover&blur=5&output=webp"
                    class="absolute inset-0 object-cover w-full h-full blur-sm" alt="{{ $champion->name }} Loading"
                    width="1278" height="348" />

                <img src="//wsrv.nl/?url={{ $champion->getChampionImageAttribute(true) }}&w=800&h=218&fit=cover&output=webp&q=85"
                    srcset="//wsrv.nl/?url={{ $champion->getChampionImageAttribute(true) }}&w=480&h=131&fit=cover&output=webp&q=85 480w,
                //wsrv.nl/?url={{ $champion->getChampionImageAttribute(true) }}&w=800&h=218&fit=cover&output=webp&q=85 800w,
                //wsrv.nl/?url={{ $champion->getChampionImageAttribute(true) }}&w=1280&h=348&fit=cover&output=webp&q=90 1280w"
                    sizes="(max-width: 600px) 480px, (max-width: 1024px) 800px, 1280px"
                    class="z-10 object-cover w-full h-full transition-transform duration-700 transform scale-100"
                    alt="{{ $champion->name }} Splash Art" loading="eager" fetchpriority="high" width="1278"
                    height="348" />

                <div class="absolute inset-0 bg-gradient-to-t from-stone-900/90 via-stone-900/40 to-transparent"></div>

                <div class="absolute inset-x-0 bottom-0 z-20 flex items-end justify-between w-full p-4">
                    <div>
                        <h3 class="mb-1 text-2xl font-bold text-white drop-shadow-lg">{{ $champion->name }}</h3>
                        <p class="mb-2 text-sm font-medium text-orange-300">{{ $champion->title }}</p>
                        <a href="{{ $champion->getChampionImageAttribute(true) }}" rel="noopener" target="_blank"
                            class="inline-flex items-center px-3 py-1 text-sm font-bold text-white transition bg-orange-500 rounded-lg bg-opacity-80 hover:bg-opacity-100">
                            <span>View Full Splash Art</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-1" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </a>
                    </div>

                    <div class="px-3 py-2 border rounded-lg bg-stone-900/80 border-orange-500/40">
                        <div class="flex items-center space-x-2">
                            @if (isset($champion->lanes) && isset($champion->lanes->roles))
                                @foreach ($champion->lanes->roles as $lane)
                                    <span class="flex items-center text-white">
                                        @svg(getRoleIconSvg($lane), 'w-5 h-5 inline-block mr-1')
                                        <span class="text-sm capitalize-first">{{ $lane }}</span>
                                    </span>
                                @endforeach
                            @else
                                <span class="text-sm text-white">Not Enough Data</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <article class="p-6 mt-8 border shadow-md bg-stone-800/40 border-neutral-300/5 rounded-2xl">
            <h2
                class="mb-6 text-2xl font-bold text-transparent uppercase bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text">
                All About {{ $champion->name }}
            </h2>

            <div class="space-y-5 text-lg leading-relaxed text-neutral-100">
                <div class="grid grid-cols-1 gap-6 mb-6 md:grid-cols-4">
                    <div class="md:col-span-3">
                        <h3 class="mb-2 text-xl font-bold text-orange-400">Champion Overview</h3>
                        <p>
                            <strong>{{ $champion->name }}</strong>, {{ $champion->title }}, is a powerful
                            {{ strtolower(implode('/', $champion->roles)) }} champion in League of Legends who is
                            mostly played
                            in
                            @if (isset($champion->lanes) && isset($champion->lanes->roles))
                                {{ strtolower(implode(' and ', $champion->lanes->roles)) }}
                            @else
                                some lanes
                            @endif
                            of Summoner's Rift. First released on {{ $champion->release_date }} during Patch
                            {{ $champion->release_patch }}, {{ $champion->name }} has become known for their
                            {{ strtolower($champion->attack_type) }} playstyle and
                            {{ strtolower($champion->adaptive_type) }} damage output.
                        </p>

                        <p class="mt-3">
                            With {{ count($champion->skins) }} unique skins available, {{ $champion->name }} offers
                            plenty of customization options for players who enjoy this champion.
                            @if (count($champion->skins) <= 3)
                                While {{ $champion->name }} doesn't have many skins yet, each one offers a unique take
                                on this champion's theme.
                            @elseif (count($champion->skins) <= 6)
                                {{ $champion->name }} has a decent collection of skins to choose from, giving players
                                plenty of options to switch up their look.
                            @elseif (count($champion->skins) <= 10)
                                {{ $champion->name }} has a good amount of skins, including some really nice
                                reimaginings of the character.
                            @else
                                {{ $champion->name }} has a ton of skins to choose from, so players can really
                                customize their experience with this champion.
                            @endif
                        </p>

                        <p class="mt-3">
                            As a champion who uses {{ $champion->resource_type }} as their resource,
                            {{ $champion->name }} brings a unique set of abilities to League of Legends that makes them
                            a
                            great champ for any team comp.
                        </p>
                    </div>

                    <div class="p-4 transition-all duration-700 border shadow-md rounded-xl border-white/10"
                        style="--tw-shadow-color:#704e3d; --tw-shadow: var(--tw-shadow-colored); background-color: #704e3d;">
                        <h4 class="mb-2 text-lg font-semibold text-center uppercase text-neutral-100">Champion Stats
                        </h4>
                        <div class="text-base text-neutral-100">
                            <p class="mb-2"><span class="font-bold">BE Cost:</span>
                                <x-icon-lcu-be-svg class="inline-block w-4" /> {{ $champion->price_be }} BE
                            </p>
                            <p class="mb-2"><span class="font-bold">RP Cost:</span>
                                <x-icon-RiotPoints class="inline-block w-4" /> {{ $champion->price_rp }} RP
                            </p>
                            <p class="mb-2"><span class="font-bold">Role:</span>
                                @foreach ($champion->roles as $role)
                                    {{ ucfirst(strtolower($role)) }}{{ !$loop->last ? ', ' : '' }}
                                @endforeach
                            </p>
                            <p class="mb-2"><span class="font-bold">Damage:</span> {{ $champion->adaptive_type }}</p>
                            <p class="mb-2"><span class="font-bold">Attack:</span>
                                {{ ucfirst(strtolower($champion->attack_type)) }}</p>
                            <p class="mb-2"><span class="font-bold">Resource:</span> {{ $champion->resource_type }}
                            </p>
                            <p><span class="font-bold">Champion ID:</span>
                                {{ $champion->champion_id }}</p>
                        </div>
                    </div>
                </div>

                <div class="p-4 mb-4 border rounded-lg bg-stone-700/20 border-orange-500/20">
                    <div class="flex flex-col items-start sm:flex-row sm:items-center">
                        <div class="mb-2 sm:mr-4 sm:mb-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-orange-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm text-neutral-200 sm:text-base">
                                Looking for a {{ $champion->name }} icon for your profile? Check out our <a
                                    href="/icons?filter%5Btitle%5D={{ urlencode($champion->name) }}"
                                    class="text-orange-400 hover:text-orange-300">{{ $champion->name }} Icons List</a>.
                            </p>
                            <p class="mt-1 text-sm text-neutral-200 sm:text-base">
                                Want to save on {{ $champion->name }} skins? Check our <a href="/sale-rotation"
                                    class="text-orange-400 hover:text-orange-300">Sale Rotation Tracker</a> to see if
                                any {{ $champion->name }} skins are currently discounted!
                            </p>
                        </div>
                    </div>
                </div>

                <h3 class="mt-8 mb-2 text-xl font-bold text-orange-400">Gameplay Style</h3>

                <p>
                    {{ $champion->name }} is primarily played as a {{ strtolower(implode('/', $champion->roles)) }},
                    leveraging their {{ strtolower($champion->attack_type) }} combat style to dominate
                    @if (isset($champion->lanes) && isset($champion->lanes->roles))
                        in the {{ strtolower(implode(' or ', $champion->lanes->roles)) }}.
                    @else
                        on the Rift.
                    @endif
                    Since their release in Patch {{ $champion->release_patch }}, players have come up with a bunch of
                    different
                    strategies and builds to maximize {{ $champion->name }}'s potential.
                </p>

                <p>
                    As a {{ strtolower($champion->adaptive_type) }}-focused champion who uses
                    {{ $champion->resource_type }} to cast their abilities, {{ $champion->name }} requires players to
                    carefully manage their resources while positioning effectively to deal maximum damage. The
                    champion's design makes them particularly effective against
                    @if (strpos(strtolower(implode('', $champion->roles)), 'assassin') !== false)
                        squishy targets like ADCs and mages, allowing for quick kills in fights.
                    @elseif (strpos(strtolower(implode('', $champion->roles)), 'tank') !== false)
                        opponents by absorbing damage and disrupting enemy formations with CC.
                    @elseif (strpos(strtolower(implode('', $champion->roles)), 'mage') !== false)
                        grouped enemies with AoE abilities and burst damage.
                    @elseif (strpos(strtolower(implode('', $champion->roles)), 'marksman') !== false)
                        targets at range, dealing consistent damage throughout extended fights. High DPS.
                    @elseif (strpos(strtolower(implode('', $champion->roles)), 'support') !== false)
                        enemy strategies by providing utility, protection, and setup for teammates.
                    @elseif (strpos(strtolower(implode('', $champion->roles)), 'fighter') !== false)
                        both squishier targets and frontline opponents with a balance of damage and durability.
                    @else
                        a variety of opponents, adapting to different situations as needed.
                    @endif
                </p>

                <div class="mt-10">
                    <h3 class="mb-4 text-xl font-bold text-orange-400">{{ $champion->name }}'s Story</h3>
                    <div class="px-5 py-4 border-l-4 rounded-r-lg border-orange-500/40 bg-stone-800/30">
                        <p class="italic text-neutral-200">
                            {{ $champion->lore }}
                        </p>
                    </div>
                </div>
            </div>
        </article>

        <!-- Skins Section with Optimized Image Loading -->
        <div class="p-6 mt-8 border shadow-md bg-stone-800/40 border-neutral-300/5 rounded-2xl">
            <h2
                class="mb-6 text-2xl font-bold text-transparent uppercase bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text">
                {{ $champion->name }} Skins Collection ({{ count($champion->skins) }})
            </h2>

            <p class="mb-6 text-neutral-100">
                Customize your {{ $champion->name }} experience with these amazing skins. From the base look to
                legendary alternatives, each skin offers a unique visual style and sometimes new animations or voice
                lines. Click on any skin to learn more about its features, release date, and pricing.
            </p>

            <div id="skinsElement" class="mt-4 overflow-x-scroll">
                <div class="grid grid-flow-col grid-rows-2 gap-4 mb-4 w-max">
                    @foreach ($champion->skins as $key => $skin)
                        <div class="flex flex-col group">
                            <a href="/skin/{{ $skin->slug }}"
                                class="relative inline-block overflow-hidden border shadow-md h-36 rounded-2xl border-3 border-white/10 group-hover:shadow-orange-500/20">
                                <!-- LQIP -->
                                <img src="//wsrv.nl/?url={{ $skin->getSkinImageAttribute(true) }}&w=20&h=12&output=webp&q=30&blur=5"
                                    class="absolute inset-0 object-cover w-full h-full transform scale-110 filter "
                                    alt="{{ $champion->name }} {{ $skin->name }} Loading" />

                                <img src="//wsrv.nl/?url={{ $skin->getSkinImageAttribute(true) }}&w=240&h=142&output=webp&q=80&fit=cover"
                                    srcset="//wsrv.nl/?url={{ $skin->getSkinImageAttribute(true) }}&w=240&h=142&output=webp&q=80&fit=cover 1x,
                                    //wsrv.nl/?url={{ $skin->getSkinImageAttribute(true) }}&w=480&h=284&output=webp&q=80&fit=cover 2x"
                                    @if ($key < 6) loading="eager" @else loading="lazy" @endif
                                    class="relative z-10 object-cover w-full h-full transition-transform duration-700 group-hover:scale-105"
                                    alt="{{ $champion->name }} {{ $skin->name }} Splash Art" />
                            </a>
                            <div>
                                <p class="align-bottom text-center text-neutral-100 text-sm mt-1.5 items-center">
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

        <!-- Streamers Section -->
        <div class="p-6 mt-8 border shadow-md bg-stone-800/40 border-neutral-300/5 rounded-2xl">
            <h2
                class="mb-4 text-2xl font-bold text-transparent uppercase bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text">
                Top {{ $champion->name }} Players & Streamers
            </h2>

            <p class="mb-6 text-neutral-100">
                Want to improve your {{ $champion->name }} gameplay? Learn from these high elo players who main or
                play a lot of {{ $champion->name }}. All streamers listed are at least Diamond 2 or higher, providing
                high-quality gameplay to learn from, or just enjoy watching. Click on their names to check out their
                content.
            </p>

            @if (count($streamers) > 0)
                <div class="grid grid-cols-2 gap-4 md:grid-cols-3 lg:grid-cols-4">
                    @foreach ($streamers as $streamer)
                        <div
                            class="p-3 transition-all border rounded-lg bg-stone-700/20 border-white/5 hover:bg-stone-700/30">
                            <a href="{{ $streamer->streamer_url }}" target="_blank" rel="noopener noreferrer"
                                class="flex flex-col items-center text-neutral-100 hover:text-orange-400">
                                <span
                                    class="mb-1 text-sm font-bold drop-shadow-lg text-shadow-{{ strtolower($streamer->platform) }}">
                                    {{ $streamer->displayname }}
                                </span>
                                <span class="text-xs text-gray-300">{{ strtoupper($streamer->platform) }}</span>
                            </a>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="p-4 text-center border rounded-lg bg-stone-700/20 border-white/5">
                    <div class="flex flex-col items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 mb-3 text-orange-400/70"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                        </svg>
                        <p class="text-neutral-100">
                            Heimerdinger.lol is currently not aware of any High ELO {{ $champion->name }} streamers. We
                            are working on a streamer submission form. Check back soon.
                        </p>
                    </div>
                </div>
            @endif
        </div>

        <div class="p-6 mt-8 border shadow-md bg-stone-800/40 border-neutral-300/5 rounded-2xl">
            <h2
                class="mb-6 text-2xl font-bold text-transparent uppercase bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text">
                Learning {{ $champion->name }}
            </h2>

            <div class="space-y-6 text-neutral-100">
                <p>
                    Whether you're just picking up {{ $champion->name }} or looking to improve your skills with this
                    {{ strtolower(implode('/', $champion->roles)) }} champion, understanding their strengths and
                    weaknesses is crucial. This champion thrives in
                    @if (isset($champion->lanes) && isset($champion->lanes->roles))
                        {{ strtolower(implode(' and ', $champion->lanes->roles)) }}
                    @else
                        various roles
                    @endif
                    with their unique kit.
                </p>

                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <div class="p-4 border rounded-lg bg-stone-700/30 border-white/5">
                        <h4 class="mb-2 font-bold text-orange-400">Champion Strengths</h4>
                        <ul class="space-y-1 list-disc list-inside">
                            @if (strpos(strtolower(implode('', $champion->roles)), 'assassin') !== false)
                                <li>High burst damage potential</li>
                                <li>High solo kill potential</li>
                                <li>Strong roaming capabilities</li>
                                <li>Good mobility for escapes</li>
                            @elseif (strpos(strtolower(implode('', $champion->roles)), 'tank') !== false)
                                <li>Impressive durability</li>
                                <li>Strong crowd control abilities</li>
                                <li>Good at starting fights</li>
                                <li>Great at frontlining</li>
                            @elseif (strpos(strtolower(implode('', $champion->roles)), 'mage') !== false)
                                <li>Powerful AoE damage</li>
                                <li>Strong waveclear</li>
                                <li>Good scaling into late game</li>
                                <li>Useful utility for team fights</li>
                            @elseif (strpos(strtolower(implode('', $champion->roles)), 'marksman') !== false)
                                <li>Consistent damage output</li>
                                <li>Strong late-game scaling</li>
                                <li>Nice at spacing</li>
                                <li>Good range for safety</li>
                            @elseif (strpos(strtolower(implode('', $champion->roles)), 'support') !== false)
                                <li>Strong utility for the team</li>
                                <li>Good protection capabilities</li>
                                <li>Effective vision control</li>
                                <li>Useful in team engagements</li>
                            @elseif (strpos(strtolower(implode('', $champion->roles)), 'fighter') !== false)
                                <li>Good balance of damage and durability</li>
                                <li>Strong dueling potential</li>
                                <li>Amazing in extended fights</li>
                            @else
                                <li>Versatile kit for various situations</li>
                                <li>Adaptable playstyle</li>
                                <li>Unique abilities in the champion roster</li>
                                <li>Effective in the right team compositions</li>
                            @endif
                        </ul>
                    </div>

                    <div class="p-4 border rounded-lg bg-stone-700/30 border-white/5">
                        <h4 class="mb-2 font-bold text-orange-400">Champion Weaknesses</h4>
                        <ul class="space-y-1 list-disc list-inside">
                            @if (strpos(strtolower(implode('', $champion->roles)), 'assassin') !== false)
                                <li>Vulnerable to crowd control</li>
                                <li>Relatively squishy in team fights</li>
                                <li>Can fall off in very late game</li>
                                <li>Requires good timing to be effective</li>
                            @elseif (strpos(strtolower(implode('', $champion->roles)), 'tank') !== false)
                                <li>Limited damage output</li>
                                <li>Can be kited by other champions</li>
                                <li>Vulnerable to percent health damage</li>
                                <li>Reliant on team follow-up</li>
                            @elseif (strpos(strtolower(implode('', $champion->roles)), 'mage') !== false)
                                <li>Usually lacks mobility</li>
                                <li>Vulnerable to assassins</li>
                                <li>Skill-shot dependent abilities</li>
                                <li>Can struggle against magic resistance</li>
                            @elseif (strpos(strtolower(implode('', $champion->roles)), 'marksman') !== false)
                                <li>Weaker early game</li>
                                <li>Vulnerable to assassins</li>
                                <li>Reliant on positioning</li>
                                <li>Limited escape options</li>
                            @elseif (strpos(strtolower(implode('', $champion->roles)), 'support') !== false)
                                <li>Limited income for items</li>
                                <li>Lower damage output</li>
                                <li>Vulnerable when caught alone</li>
                                <li>Dependent on team play</li>
                            @elseif (strpos(strtolower(implode('', $champion->roles)), 'fighter') !== false)
                                <li>Can be kited by ranged champions</li>
                                <li>May struggle against true tanks</li>
                                <li>Often lacks strong engage tools</li>
                                <li>Can be outscaled in late game</li>
                            @else
                                <li>May struggle against specialized champions</li>
                                <li>Has counterplay options available</li>
                                <li>Requires good game knowledge to maximize potential</li>
                                <li>May not excel in any specific area</li>
                            @endif
                        </ul>
                    </div>
                </div>

                <p class="mt-4">
                    {{ $champion->name }} currently costs <x-icon-lcu-be-svg class="inline-block w-4" />
                    {{ $champion->price_be }} BE or <x-icon-RiotPoints class="inline-block w-4" />
                    {{ $champion->price_rp }} RP to unlock, making them
                    @if ($champion->price_be <= 1350)
                        one of the more cheaper champions for new players.
                    @elseif ($champion->price_be <= 3150)
                        reasonably priced for players building their champion pool.
                    @elseif ($champion->price_be <= 4800)
                        on the more expensive side for new players.
                    @else
                        one of the more expensive champions.
                    @endif
                    Players looking to master {{ $champion->name }} should spend time learning their unique mechanics
                    and optimal build paths for different matchups.
                </p>
            </div>
        </div>
    </div>
</section>
@push('top_scripts')
    @vite('resources/js/lane-filter.js')
@endpush
@push('bottom_scripts')
    @include('popper::assets')
@endpush
