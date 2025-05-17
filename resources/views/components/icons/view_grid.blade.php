<section class="max-w-screen-xl mx-auto mt-12">
    <h3
        class="text-sm font-bold text-center text-transparent uppercase sm:text-md bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text">
        Icon Spotlight
    </h3>
    <h1
        class="text-3xl font-bold text-center text-transparent uppercase sm:text-4xl bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text">
        {{ $icon->title }}
    </h1>
    <h2
        class="text-sm font-bold text-center text-transparent uppercase md:text-lg bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text">
        Released in {{ $icon->release_year }}
    </h2>


    <div class="container mx-auto mt-8">
        <div class="relative p-6 overflow-hidden border shadow-md rounded-2xl bg-stone-800/40 border-neutral-300/5">
            <div class="flex flex-col items-center gap-8 md:flex-row md:items-start">
                <div class="flex flex-col items-center flex-shrink-0">
                    <div class="mb-3 transition-all duration-500 group">
                        <div class="relative w-64 h-64" style="aspect-ratio: 1/1;">
                            <div
                                class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-br from-orange-400/20 to-orange-500/30 rounded-2xl group-hover:opacity-100">
                            </div>

                            <img src="//wsrv.nl/?url={{ $icon->image }}&w=20&h=20&output=webp&q=30&blur=5"
                                alt="{{ $icon->title }} Loading"
                                class="absolute inset-0 object-cover w-full h-full rounded-2xl" width="256"
                                height="256" />

                            <img src="//wsrv.nl/?url={{ $icon->image }}&w=256&output=webp&q=80"
                                srcset="//wsrv.nl/?url={{ $icon->image }}&w=128&output=webp&q=80 128w,
                                        //wsrv.nl/?url={{ $icon->image }}&w=256&output=webp&q=80 256w,
                                        //wsrv.nl/?url={{ $icon->image }}&w=512&output=webp&q=85 512w"
                                sizes="(max-width: 768px) 128px, 256px" alt="{{ $icon->title }} Icon" loading="eager"
                                width="256" height="256"
                                class="relative z-10 object-contain w-full h-full transition-transform duration-500 border-2 shadow-lg rounded-2xl bg-clip-border border-orange-400/40 shadow-orange-400/20 group-hover:scale-105" />
                        </div>
                    </div>
                    <a href="{{ $icon->image }}" rel="noopener" target="_blank"
                        class="inline-flex items-center px-3 py-1 text-sm font-bold text-white transition bg-orange-500 rounded-lg bg-opacity-80 hover:bg-opacity-100">
                        <span>View Full Size</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-1" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </a>
                </div>

                <div class="flex-grow">
                    <h3
                        class="mb-4 text-2xl font-bold text-transparent uppercase bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text">
                        About This Icon
                    </h3>
                    <div class="space-y-4 text-lg leading-relaxed text-neutral-100">
                        <p>
                            The <strong>{{ $icon->title }}</strong> is a {{ $icon->legacy ? 'legacy' : 'standard' }}
                            summoner icon first introduced to League of Legends in {{ $icon->release_year }}.
                            @if ($icon->esports_team || $icon->esports_region || $icon->esports_event)
                                This is an esports-themed icon
                                @if ($icon->esports_team)
                                    representing the team <strong>{{ $icon->esports_team }}</strong>
                                @endif
                                @if ($icon->esports_region)
                                    from the <strong>{{ $icon->esports_region }}</strong> region
                                @endif
                                @if ($icon->esports_event)
                                    featured during the <strong>{{ $icon->esports_event }}</strong> event
                                @endif.
                            @endif
                        </p>

                        <p>{{ $icon->description }}</p>

                        <p>
                            Summoner icons like the {{ $icon->title }} let you personalize your League of
                            Legends account, displaying next to your name in friend lists, lobbies, and post-game
                            screens.
                            It's also generally shown on 3rd-party sites like op.gg and u.gg.
                            They're a popular way for players to express their personality, support for
                            teams or to create a nice looking profile for themselves.
                        </p>

                        <p>
                            @if ($icon->release_year < 2016)
                                This icon comes from the {{ $icon->release_year < 2013 ? 'early' : 'classic' }} era of
                                League of Legends, when icon releases were less frequent and often tied to significant
                                game events or milestones. Icons from this period are particularly valued by long-time
                                players.
                            @elseif ($icon->release_year >= 2016 && $icon->release_year <= 2020)
                                Released during {{ $icon->release_year }}, this icon arrived during a period when Riot
                                began expanding the variety and availability of summoner icons, offering more ways for
                                players to customize their profiles and express themselves in the game client.
                            @else
                                As a more recent addition to League's icon collection, the {{ $icon->title }} features
                                the modern design aesthetic that matches Riot's current approach to player
                                customization.
                            @endif
                        </p>

                        @if ($icon->legacy)
                            <div class="p-4 mt-4 border rounded-lg bg-stone-700/30 border-orange-500/20">
                                <p class="text-base text-neutral-200">
                                    <span class="font-bold text-orange-400">Legacy Status:</span> This is considered a
                                    legacy icon, which means it may have limited availability. Unlike legacy skins,
                                    legacy icons don't follow consistent rules. Some can still be obtainable through
                                    special events or promotions, while others might be permanently unavailable.
                                </p>
                            </div>
                        @endif

                        @if ($icon->icon_id === 6584)
                            <div class="p-4 mt-4 border rounded-lg bg-stone-700/30 border-orange-500/20">
                                <p class="text-base font-medium text-neutral-100">
                                    <span class="font-bold text-orange-400">Special Guide:</span> Wondering how to get
                                    this icon? Check out our
                                    <a href="/post/how-to-get-hatty-crabby-icon-in-league-of-legends"
                                        class="text-orange-400 underline hover:text-orange-300">complete guide on
                                        obtaining the Hatty Crabby Icon</a>.
                                </p>
                            </div>
                        @endif

                        @if ($icon->icon_id === 6846)
                            <div class="p-4 mt-4 border rounded-lg bg-stone-700/30 border-orange-500/20">
                                <p class="text-base font-medium text-neutral-100">
                                    <span class="font-bold text-orange-400">Special Guide:</span> Wondering how to get
                                    this icon? Check out our <a href="/post/how-to-get-ez-be-real-icon"
                                        class="text-orange-400 underline hover:text-orange-300">complete guide on
                                        obtaining the Ez-be-real Icon</a>.
                                </p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="ad-slot-container mx-auto my-5 w-full max-w-[970px] min-h-[250px]">
            <div class="ad-slot-wrapper"
                style="
                width: 100%;
                max-width: 970px; /* Matches AdSense typical leaderboard size */
                min-height: 250px; /* Matches AdSense typical medium rectangle or leaderboard */
                margin: 0 auto; /* Centered */
                display: flex;
                justify-content: center;
                align-items: center;
                overflow: hidden;
            ">
                <x-ads.common />
            </div>

            <div id="donation-fallback"
                class="hidden w-full max-w-[970px] min-h-[250px] p-6 mx-auto border shadow-md bg-stone-800/40 border-neutral-300/5 rounded-2xl text-center flex flex-col justify-center items-center">
                <p class="mb-4 text-lg text-neutral-100">
                    We appreciate you using Heimerdinger.lol!
                </p>
                <p class="mb-6 text-neutral-200">
                    Your support helps us keep the site running. Please consider donating.
                </p>
                <a href="/donate"
                    class="inline-flex items-center px-6 py-3 text-lg font-bold text-white transition bg-orange-500 rounded-lg bg-opacity-80 hover:bg-opacity-100">
                    Support Us
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-6 mt-8 md:grid-cols-2">
            <div class="p-6 border shadow-md bg-stone-800/40 border-neutral-300/5 rounded-2xl">
                <h3 class="mb-4 text-xl font-bold text-orange-400">
                    How to Obtain
                </h3>
                <div class="text-neutral-100">
                    <p>
                        @if ($icon->legacy)
                            As a legacy icon from {{ $icon->release_year }}, the {{ $icon->title }} icon might not be
                            directly available for purchase. Legacy icons typically appear during special events,
                            promotions, or through hextech crafting.

                            @if ($icon->esports_team || $icon->esports_region || $icon->esports_event)
                                Since this is an esports icon, it may reappear during relevant tournaments or team
                                promotions.
                            @endif
                        @else
                            The {{ $icon->title }} icon, released in {{ $icon->release_year }}, may be available
                            through the League of Legends store, event passes, missions, or hextech crafting.

                            @if ($icon->esports_team || $icon->esports_region || $icon->esports_event)
                                As an esports-themed icon, it's often available during relevant tournaments or through
                                team support bundles.
                            @endif
                        @endif
                    </p>

                    <p class="mt-3">
                        When available in the store, summoner icons usually cost 250 RP, though
                        special or limited editions may be priced differently. Some icons are also obtainable with Blue
                        Essence during special promotions or through the Essence Emporium when it's active.
                    </p>

                    <p class="mt-3">
                        Riot occasionally brings back legacy content during special events like anniversaries, seasonal
                        celebrations, or game milestones. If you're specifically looking to add the {{ $icon->title }}
                        to your collection, watch for event announcements in the client or on the official <a
                            href="https://www.leagueoflegends.com/en-us/news/"
                            class="text-orange-400 underline hover:text-orange-300">League of
                            Legends</a> website.
                    </p>

                    <p class="mt-3">
                        Keep an eye on the in-game client for special promotions or events where this icon might become
                        available again.
                    </p>
                </div>
            </div>

            <div class="h-full p-6 border shadow-md bg-stone-800/40 border-neutral-300/5 rounded-2xl">
                <h3 class="mb-4 text-xl font-bold text-orange-400">
                    Technical Details
                </h3>
                <div class="grid grid-rows-[auto_1fr]  text-neutral-100">
                    <p>
                        Each summoner icon in League of Legends has some technical specifications. The
                        {{ $icon->title }} is identified in Riot's systems by the icon ID <span
                            class="font-mono font-semibold">{{ $icon->icon_id }}</span>.
                    </p>

                    <div class="pt-4 mt-auto ">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="p-3 rounded-lg bg-stone-700/30">
                                <span class="block text-sm text-neutral-400">Icon ID</span>
                                <span class="font-mono font-medium">{{ $icon->icon_id }}</span>
                            </div>

                            <div class="p-3 rounded-lg bg-stone-700/30">
                                <span class="block text-sm text-neutral-400">Release Year</span>
                                <span>{{ $icon->release_year }}</span>
                            </div>

                            <div class="p-3 rounded-lg bg-stone-700/30">
                                <span class="block text-sm text-neutral-400">Legacy Status</span>
                                <span>{{ $icon->legacy ? 'Legacy' : 'Standard' }}</span>
                            </div>

                            <div class="p-3 rounded-lg bg-stone-700/30">
                                <span class="block text-sm text-neutral-400">Type</span>
                                <span>{{ $icon->esports_team || $icon->esports_region || $icon->esports_event ? 'Esports' : 'Standard' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="p-6 mt-8 border shadow-md bg-stone-800/40 border-neutral-300/5 rounded-2xl">
            <h3 class="mb-4 text-xl font-bold text-orange-400">
                Design & Significance
            </h3>
            <div class="text-neutral-100">
                <p>
                    The {{ $icon->title }} features a classic design that captures its thematic elements in League
                    of Legends' iconic art style. A lot of players like to use icons to make their profile look nice,
                    and match with profile backgrounds, borders, etc.
                </p>

                <p class="mt-3">
                    @if ($icon->esports_team)
                        As an esports team icon, it prominently displays {{ $icon->esports_team }}'s branding elements
                        and color scheme, allowing fans to show their support in the game client. Team icons often
                        become collectors' items, especially for teams with historical significance or memorable
                        tournament performances.
                    @elseif (strpos(strtolower($icon->title), 'poro') !== false)
                        This icon features League's beloved Poro character, the fluffy creature native to the Howling
                        Abyss. Poro-themed items are consistently popular among players due to their cute and whimsical
                        design aesthetic.
                    @elseif (strpos(strtolower($icon->title), 'champie') !== false ||
                            strpos(strtolower($icon->description), 'champie') !== false ||
                            strpos(strtolower($icon->title), 'illustration') !== false)
                        This champion-themed icon captures elements of a League character's identity, allowing fans of
                        that champion to showcase their preference or mastery.
                    @else
                        The art style and thematic elements of this icon reflect Riot's approach to visual design in
                        {{ $icon->release_year }}, with the characteristic attention to detail and distinctive style
                        that League of Legends is known for.
                    @endif
                </p>

                <p class="mt-3">
                    Players often select icons that represent their main role, favorite champion, esports team they
                    like, or
                    just looks cool. The {{ $icon->title }} offers a way for summoners to personalize
                    their League experience and express themselves within the community.
                </p>
            </div>
        </div>

        <div class="p-6 mt-8 border shadow-md bg-stone-800/40 border-neutral-300/5 rounded-2xl">
            <h3 class="mb-4 text-xl font-bold text-orange-400">
                Related Content
            </h3>
            <div class="text-neutral-100">
                <p>
                    Interested in more summoner icons or related League of Legends content? Here are some resources that
                    might help:
                </p>

                <p class="mt-3">
                    League of Legends has over 1500 summoner icons spanning more than a decade of the game's
                    history. They range from esports team icons to event commemorations, champion icons, and
                    ranked achievements.
                </p>

                <div class="grid grid-cols-1 gap-4 mt-4 sm:grid-cols-2 lg:grid-cols-3">
                    <a href="/icons?filter%5Brelease_year%5D={{ $icon->release_year }}"
                        class="block p-4 transition-all duration-300 border rounded-lg bg-stone-700/20 border-white/10 hover:border-orange-500/30 hover:bg-stone-700/30">
                        <h4 class="mb-2 font-semibold text-orange-400">Icons from {{ $icon->release_year }}</h4>
                        <p class="text-sm text-neutral-300">Explore other summoner icons released in the same year.</p>
                    </a>

                    @if ($icon->esports_team)
                        <a href="/icons?filter%5Besports_team%5D={{ urlencode($icon->esports_team) }}"
                            class="block p-4 transition-all duration-300 border rounded-lg bg-stone-700/20 border-white/10 hover:border-orange-500/30 hover:bg-stone-700/30">
                            <h4 class="mb-2 font-semibold text-orange-400">{{ $icon->esports_team }} Icons</h4>
                            <p class="text-sm text-neutral-300">View all icons related to this esports team.</p>
                        </a>
                    @endif

                    <a href="/icons"
                        class="block p-4 transition-all duration-300 border rounded-lg bg-stone-700/20 border-white/10 hover:border-orange-500/30 hover:bg-stone-700/30">
                        <h4 class="mb-2 font-semibold text-orange-400">All Summoner Icons</h4>
                        <p class="text-sm text-neutral-300">Browse our complete collection of League of Legends icons.
                        </p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@push('bottom_scripts')
    <script type="application/ld+json">
    @php
    $description = "The " . $icon->title . " is a " . ($icon->legacy ? 'legacy' : 'standard') . " summoner icon for League of Legends released in " . $icon->release_year . ".";
    if ($icon->description) {
        $description .= " " . $icon->description;
    }

    // Create the JSON object
    $jsonObject = [
        "@context" => "https://schema.org/",
        "@type" => "WebPage",
        "name" => $icon->title . " - League of Legends Summoner Icon",
        "description" => $description,
        "mainEntity" => [
            "@type" => "VisualArtwork",
            "name" => $icon->title,
            "description" => $description,
            "image" => $icon->image,
            "dateCreated" => $icon->release_year,
            "artform" => "Digital Icon",
            "artworkSurface" => "Digital",
            "creator" => [
                "@type" => "Organization",
                "name" => "Riot Games"
            ],
            "contentLocation" => [
                "@type" => "Place",
                "name" => "League of Legends"
            ]
        ],
        "publisher" => [
            "@type" => "Organization",
            "name" => "Heimerdinger.lol"
        ],
        "url" => url()->current()
    ];

    echo json_encode($jsonObject, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    @endphp
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const adWrapper = document.querySelector('.ad-slot-wrapper');
            const fallbackContainer = document.getElementById('donation-fallback');

            setTimeout(function() {
                const adElement = adWrapper.querySelector('ins.adsbygoogle');
                let adIsVisible = false;

                if (adElement) {
                    // check if ad is marked as unfilled
                    const adStatus = adElement.getAttribute('data-ad-status');
                    if (adStatus === 'unfilled') {
                        adIsVisible = false;
                    } else {
                        const adRect = adElement.getBoundingClientRect();
                        if (adRect.width > 1 && adRect.height > 1 && getComputedStyle(adElement).display !==
                            'none') {
                            adIsVisible = true;
                        }
                    }
                }

                if (!adIsVisible) {
                    if (adWrapper) adWrapper.style.display = 'none';
                    if (fallbackContainer) fallbackContainer.classList.remove('hidden');
                } else {
                    if (adWrapper) adWrapper.style.display = 'flex';
                    if (fallbackContainer) fallbackContainer.classList.add('hidden');
                }
            }, 2575);
        });
    </script>
@endpush
