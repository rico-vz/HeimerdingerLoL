<section class="max-w-screen-xl mx-auto mt-12">
    <h3
        class="text-sm font-bold text-center text-transparent uppercase sm:text-md bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text">
        Skin Spotlight
    </h3>
    <h1
        class="text-3xl font-bold text-center text-transparent uppercase sm:text-4xl bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text">
        {{ $skin->skin_name }}
    </h1>
    <p
        class="text-sm font-medium text-center text-orange-400 uppercase transition-all duration-700 hover:underline decoration-1 decoration-transparent hover:decoration-orange-400">
        <a href="/champion/{{ $skin->champion->slug }}">
            <span class="flex items-center justify-center">
                View champion info
                <x-iconsax-bul-arrow-square-right class="w-5" />
            </span>
        </a>
    </p>

    <x-ads.common />

    <!-- Hero Section with Splash Art -->
    <div class="container mx-auto mt-8">
        <!-- Compact Splash Art Section -->
        <div class="relative overflow-hidden border shadow-sm rounded-2xl bg-stone-800/40 border-neutral-300/5 shadow-stone-800/80"
            style="height: 350px;">
            <div class="absolute inset-0 glow-shadow rounded-2xl">
            </div>

            <!-- Splash Art -->
            <div class="relative w-full h-full">
                <img src="//wsrv.nl/?url={{ $skin->getSkinImageAttribute(true) }}&w=30&h=20&fit=cover&blur=5&output=webp"
                    class="absolute inset-0 object-cover w-full h-full blur-sm" alt="{{ $skin->skin_name }} Loading" />
                <img src="//wsrv.nl/?url={{ $skin->getSkinImageAttribute(true) }}&w=800&h=350&fit=cover&output=webp&q=85"
                    srcset="//wsrv.nl/?url={{ $skin->getSkinImageAttribute(true) }}&w=480&h=350&fit=cover&output=webp&q=85 480w,
                //wsrv.nl/?url={{ $skin->getSkinImageAttribute(true) }}&w=800&h=350&fit=cover&output=webp&q=85 800w,
                //wsrv.nl/?url={{ $skin->getSkinImageAttribute(true) }}&w=1200&h=350&fit=cover&output=webp&q=90 1200w"
                    sizes="(max-width: 600px) 480px, (max-width: 1024px) 800px, 1200px"
                    class="z-10 object-cover w-full h-full transition-transform duration-700 transform scale-100"
                    alt="{{ $skin->skin_name }} Splash Art" loading="eager" />

                <!-- Gradient Overlay for Text Readability -->
                <div class="absolute inset-0 bg-gradient-to-t from-stone-900/90 via-stone-900/40 to-transparent"></div>

                <!-- Info Overlay -->
                <div class="absolute inset-x-0 bottom-0 z-20 flex items-end justify-between w-full p-4">
                    <div>
                        <h3 class="mb-1 text-2xl font-bold text-white drop-shadow-lg">{{ $skin->skin_name }}</h3>
                        <p class="mb-2 text-sm font-medium text-orange-300">{{ $skin->rarity }} Skin for
                            {{ $skin->champion->name }}</p>
                        <a href="{{ $skin->getSkinImageAttribute(true) }}" rel="noopener" target="_blank"
                            class="inline-flex items-center px-3 py-1 text-sm font-bold text-white transition bg-orange-500 rounded-lg bg-opacity-80 hover:bg-opacity-100">
                            <span>View Full Art</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-1" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </a>
                    </div>

                    <!-- Quick Price Info -->
                    <div class="px-3 py-2 border rounded-lg bg-stone-900/80 border-orange-500/40">
                        @if ($skin->rp_price == '99999')
                            <span class="font-bold text-orange-400">Special Offer</span>
                        @else
                            <span class="flex items-center font-bold text-white">
                                <x-icon-RiotPoints class="inline-block w-5 mr-1" />
                                {{ $skin->rp_price }} RP
                            </span>
                        @endif
                        <div class="mt-1 text-xs text-gray-300">
                            @if ($skin->release_date == '0000-00-00')
                                Coming Soon
                            @else
                                Released: {{ $skin->release_date }}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Article Content -->
        <article class="p-6 mt-8 border shadow-md bg-stone-800/40 border-neutral-300/5 rounded-2xl">
            <h2
                class="mb-6 text-2xl font-bold text-transparent uppercase bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text">
                Everything You Need to Know About {{ $skin->skin_name }}
            </h2>

            <div class="space-y-5 text-lg leading-relaxed text-neutral-100">
                <div class="grid grid-cols-1 gap-6 mb-6 md:grid-cols-4">
                    <div class="md:col-span-3">
                        <h3 class="mb-2 text-xl font-bold text-orange-400">The Basics</h3>
                        <p>
                            Looking to spice up your games with a killer new look for {{ $skin->champion->name }}?
                            Let's
                            dive into everything you need to know about <strong>{{ $skin->skin_name }}</strong>, a
                            unique skin for
                            {{ $skin->champion->name }}. This skin is all about giving your favorite champion a fresh
                            new look!
                        </p>
                    </div>

                    <!-- Quick Facts Card -->
                    <div class="p-4 transition-all duration-700 border shadow-md rounded-xl border-white/10"
                        style="--tw-shadow-color:#704e3d; --tw-shadow: var(--tw-shadow-colored); background-color: #704e3d;">
                        <h4 class="mb-2 text-lg font-semibold text-center uppercase text-neutral-100">Quick Facts</h4>
                        <div class="text-base text-neutral-100">
                            <p class="mb-2"><span class="font-bold">Price:</span>
                                @if ($skin->rp_price == '99999')
                                    Special Availability
                                @else
                                    <x-icon-RiotPoints class="inline-block w-4" /> {{ $skin->rp_price }} RP
                                @endif
                            </p>
                            <p class="mb-2"><span class="font-bold">Released:</span>
                                @if ($skin->release_date == '0000-00-00')
                                    Coming Soon
                                @else
                                    {{ $skin->release_date }}
                                @endif
                            </p>
                            <p class="mb-2"><span class="font-bold">Rarity:</span> {{ $skin->rarity }}</p>
                            <p class="mb-2"><span class="font-bold">Available:</span> {{ $skin->availability }}</p>
                        </div>
                    </div>
                </div>

                <p>
                    @if ($skin->release_date == '0000-00-00')
                        Riot hasn't dropped this skin on live servers just yet, but it's definitely on the way!
                        {{ $skin->skin_name }}
                        might already be available on PBE, or maybe already has a SkinSpotlights video. While we don't
                        have an exact
                        release date yet, this {{ $skin->rarity }} tier skin will be joining
                        {{ $skin->champion->name }}'s collection soon.
                    @else
                        Since its release on <strong>{{ $skin->release_date }}</strong>, this {{ $skin->rarity }} tier
                        skin has become
                        @if ($skin->availability == 'Available')
                            a popular pick among players who want to make their {{ $skin->champion->name }} stand out
                            from the crowd.
                        @elseif ($skin->availability == 'Legacy')
                            a legacy skin. This means it's no longer available for purchase in the store, but you might
                            be able to
                            get it from chests, rerolling skins, or during specific periods in the year when Riot brings
                            it back.
                        @elseif ($skin->availability == 'Limited')
                            an extremely rare sight on the Rift. If you spot someone rocking this skin, you know they're
                            either a long-time player or incredibly lucky.
                        @elseif ($skin->availability == 'Upcoming')
                            an upcoming skin addition to the game that some players can't wait to get their hands on.
                        @else
                            a unique addition to {{ $skin->champion->name }}'s wardrobe that offers a fresh take on
                            this champion's look and feel.
                        @endif
                    @endif
                </p>

                <h3 class="mt-8 mb-2 text-xl font-bold text-orange-400">What Makes This Skin Special</h3>

                <p>
                    Let's talk about what makes {{ $skin->skin_name }} worth your RP.
                    @if ($skin->rp_price == '99999')
                        This isn't your standard RP purchase - it's part of a special promotion or event, making it a
                        bit more exclusive than your typical skin. It might be available exclusively through a
                        battlepass, gacha systems (The Sanctum), or something else.
                    @else
                        At <strong>{{ $skin->rp_price }} RP</strong>, you're getting
                        @if ($skin->rp_price < 975)
                            a budget-friendly option that still gives {{ $skin->champion->name }} a fresh look, so you
                            can stand out.
                        @elseif ($skin->rp_price >= 975 && $skin->rp_price < 1350)
                            a relatively cheap skin with decent quality visuals, sometimes even some new animations or
                            effects.
                        @elseif ($skin->rp_price >= 1350 && $skin->rp_price < 1820)
                            a feature-rich skin with plenty of new visuals that really change how
                            {{ $skin->champion->name }} looks in-game.
                        @elseif ($skin->rp_price >= 1820)
                            a premium experience, likely with completely overhauled visuals, animations, and potentially
                            voice
                            work.
                        @endif
                    @endif
                </p>

                <div class="pl-5 my-4 border-l-4 border-orange-500/50">
                    <p class="text-neutral-200">
                        @if ($skin->new_effects && $skin->new_animations && $skin->new_recall && $skin->new_voice && $skin->new_quotes)
                            This skin is loaded with upgrades! It's got completely new visual effects, fresh animations,
                            a custom recall, a new voice over, and unique voice lines. When you buy
                            {{ $skin->skin_name }}, you're basically getting a completely reimagined version of
                            {{ $skin->champion->name }}.
                        @else
                            Here's what you get with {{ $skin->skin_name }}:
                            @if ($skin->new_effects)
                                <span class="block mt-1">✓ Brand new visual effects that add serious flair to your
                                    abilities</span>
                            @endif
                            @if ($skin->new_animations)
                                <span class="block mt-1">✓ Fresh animations that make {{ $skin->champion->name }} move
                                    in new, thematic ways</span>
                            @endif
                            @if ($skin->new_recall)
                                <span class="block mt-1">✓ A custom recall animation that's worth showing off before you
                                    head back to base</span>
                            @endif
                            @if ($skin->new_voice)
                                <span class="block mt-1">✓ A completely new voice that transforms the champion's
                                    personality</span>
                            @endif
                            @if ($skin->new_quotes)
                                <span class="block mt-1">✓ New voice lines that add depth and storytelling to the skin's
                                    theme</span>
                            @endif
                            @if (!$skin->new_effects && !$skin->new_animations && !$skin->new_recall && !$skin->new_voice && !$skin->new_quotes)
                                While this skin doesn't add new effects or animations, it offers a visual
                                redesign that gives {{ $skin->champion->name }} a fresh look on the Rift.
                            @endif
                        @endif
                    </p>
                </div>

                <p>
                    @if (count($skin->chromas) > 0)
                        If one look isn't enough for you, {{ $skin->skin_name }} comes with
                        <strong>{{ $skin->chromas->count() }} different chroma options</strong>. That means once you
                        own the base skin, you can pick up these color variants to match your mood or your team comp.
                        Some players collect them all, while others just grab their favorite color.
                    @else
                        Unlike some skins that come with a rainbow of chromas, {{ $skin->skin_name }} keeps it focused
                        with just the base design. So sadly, no chroma options here.
                    @endif
                </p>

                <p>
                    One thing to keep in mind: this skin is {{ $skin->loot_eligible ? 'available' : 'not available' }}
                    through the loot system.
                    @if ($skin->loot_eligible)
                        So if you're the type to save your RP, you might get lucky with a hextech chest or event orb.
                        But don't count on it - if you really want this skin, buying it directly is your best bet.
                    @else
                        That means you won't find it in hextech chests or event orbs, so direct purchase is your only
                        option if you want to add it to your collection.
                    @endif
                </p>

                <div class="mt-10">
                    <h3 class="mb-3 text-xl font-bold text-orange-400">Who made {{ $skin->skin_name }}?</h3>
                    <p>
                        Ever wonder who's responsible for making these skins? We'll break it down for you:
                    </p>

                    <p class="mt-3">
                        @if (count($skin->voice_actor) > 0)
                            When you hear {{ $skin->skin_name }} in game, you're listening to
                            @if (count($skin->voice_actor) == 1)
                                the work of voice actor {{ $skin->voice_actor[0] }}, who brings real personality to the
                                lines.
                            @else
                                a team of voice talents including
                                @foreach ($skin->voice_actor as $key => $voice_actor)
                                    {{ $voice_actor }}
                                    @if ($key < count($skin->voice_actor) - 2)
                                        ,
                                    @elseif ($key == count($skin->voice_actor) - 2)
                                        and
                                    @endif
                                @endforeach, who collaborated to create the skin's unique sound.
                            @endif
                        @else
                            Riot hasn't shared who voiced {{ $skin->skin_name }}, but we hope you enjoy the new lines
                            and
                            personality they bring to the game anyway!
                        @endif
                    </p>

                    <p class="mt-3">
                        @if (count($skin->splash_artist) > 0)
                            That splash art that caught your eye? It came from the tablet of
                            @if (count($skin->splash_artist) == 1)
                                {{ $skin->splash_artist[0] }}, one of Riot's talented artists who really captured the
                                essence of {{ $skin->skin_name }}.
                            @else
                                several artists working together:
                                @foreach ($skin->splash_artist as $key => $splash_artist)
                                    {{ $splash_artist }}
                                    @if ($key < count($skin->splash_artist) - 2)
                                        ,
                                    @elseif ($key == count($skin->splash_artist) - 2)
                                        and
                                    @endif
                                @endforeach. This collaboration resulted in the amazing artwork you
                                see on the champion select screen.
                            @endif
                        @else
                            Riot hasn't revealed who created the splash art for {{ $skin->skin_name }}, but we can
                            appreciate the effort that went into it regardless. This could mean the splash art of
                            {{ $skin->skin_name }}
                            was created by Riot's internal team, or perhaps still a freelance artist that hasn't been
                            revealed yet.
                        @endif
                    </p>
                </div>
            </div>

            <!-- Lore Section -->
            <div class="p-6 mt-10 border rounded-2xl border-white/10" style="background-color: #704e3d;">
                <h3 class="mb-4 text-xl font-bold text-neutral-100">The Story Behind {{ $skin->skin_name }}</h3>
                <div class="leading-relaxed text-neutral-100">
                    @if ($skin->lore)
                        {!! $skin->lore !!}
                    @else
                        <p>
                            We've dug through all of Riot's lore posts and cosmic archives, but sadly there's no
                            official backstory for
                            {{ $skin->skin_name }}... yet!

                            @if ($skin->release_date == '0000-00-00')
                                Since this skin is still on its way to the live servers, we might get some juicy lore
                                when it officially drops. Keep an eye on Riot's social media and the client for universe
                                updates.
                            @else
                                Don't let that stop you from enjoying this skin though! It first arrived on
                                {{ $skin->release_date }} and costs
                                {{ $skin->rp_price == '99999' ? 'a special rate' : $skin->rp_price . ' RP' }}.
                            @endif

                            You can always make up your own headcanon about how {{ $skin->champion->name }} came to
                            have this look. That's half the fun of League's multiverse of skin lines!
                        </p>
                    @endif
                </div>
            </div>
        </article>

        <!-- Chromas Gallery Section -->
        @if (count($skin->chromas) > 0)
            <div class="p-6 mt-8 border shadow-md bg-stone-800/40 border-neutral-300/5 rounded-2xl">
                <h2
                    class="mb-6 text-2xl font-bold text-transparent uppercase bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text">
                    Color Options: {{ $skin->skin_name }} Chromas
                </h2>

                <p class="mb-6 text-neutral-100">
                    Can't decide on just one look? We don't blame you! {{ $skin->skin_name }} comes with
                    {{ count($skin->chromas) }} different chroma options that let you customize your favorite skin.
                    Whether you want to match your team's color scheme or just feel like switching things up, these
                    variants have got you covered without changing any of the awesome features of the base skin.
                </p>

                <div id="skinsElement" class="mt-4 overflow-x-scroll">
                    <div class="grid grid-flow-col grid-rows-2 gap-4 mb-4 w-max">
                        @foreach ($skin->chromas as $key => $chroma)
                            <div class="flex flex-col group">
                                <a href="/skin/{{ $skin->slug }}">
                                    <img src="//wsrv.nl/?url={{ $chroma->getChromaImageAttribute() }}&w=220&output=webp&q=70&il"
                                        alt="{{ $chroma->chroma_name }} {{ $chroma->skin_name }} ScreenShot"
                                        @if ($key < 6) loading="eager" @else loading="lazy" @endif
                                        class="inline-block h-36 object-cover rounded-2xl shadow-md border border-3 border-white/10 hover:shadow-orange-500/20 transition-all duration-700 mr-2.5">
                                </a>
                                <p class="align-bottom text-center text-neutral-100 text-sm mt-1.5 items-center">
                                    <span class="hover:text-orange-400 group-hover:text-orange-400">
                                        {{ $chroma->chroma_name }}
                                    </span>
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>

                <p class="mt-6 text-neutral-100">
                    Each chroma costs 290 RP, or you can often grab them all in a bundle at a discount. Keep an eye out
                    for essence emporiums too, where you might be able to snag these with Blue Essence instead of RP.
                    Which one's your favorite?
                </p>
            </div>
        @endif

        <!-- Conclusion Section -->
        <div class="p-6 mt-8 border shadow-md bg-stone-800/40 border-neutral-300/5 rounded-2xl">
            <h2
                class="mb-4 text-2xl font-bold text-transparent uppercase bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text">
                Is {{ $skin->skin_name }} Worth It?
            </h2>

            <div class="text-lg leading-relaxed text-neutral-100">
                <p>
                    So, should you pick up {{ $skin->skin_name }} for your collection? Let's break it down:
                </p>

                <div class="grid grid-cols-1 gap-4 my-6 md:grid-cols-2">
                    <div class="p-4 border rounded-lg bg-stone-700/30 border-white/5">
                        <h4 class="mb-2 font-bold text-orange-400">Reasons to Buy:</h4>
                        <ul class="space-y-1 list-disc list-inside">
                            @if ($skin->new_effects)
                                <li>Fresh visual effects that make abilities pop</li>
                            @endif
                            @if ($skin->new_animations)
                                <li>Smooth new animations that feel great to play</li>
                            @endif
                            @if ($skin->new_recall)
                                <li>A recall animation worth showing off</li>
                            @endif
                            @if ($skin->new_voice)
                                <li>New voice lines and personality</li>
                            @endif
                            @if (count($skin->chromas) > 0)
                                <li>{{ count($skin->chromas) }} chroma options for variety</li>
                            @endif
                            <li>{{ $skin->rarity }} tier quality visuals</li>
                            @if ($skin->availability == 'Limited' || $skin->availability == 'Legacy')
                                <li>Rare skin that not everyone has</li>
                            @endif
                        </ul>
                    </div>

                    <div class="p-4 border rounded-lg bg-stone-700/30 border-white/5">
                        <h4 class="mb-2 font-bold text-orange-400">Consider This:</h4>
                        <ul class="space-y-1 list-disc list-inside">
                            @if ($skin->rp_price > 1350)
                                <li>Higher price point than basic skins</li>
                            @endif
                            @if (!$skin->new_effects)
                                <li>Doesn't have new visual effects</li>
                            @endif
                            @if (!$skin->new_animations)
                                <li>Uses the base animation set</li>
                            @endif
                            @if (!$skin->loot_eligible)
                                <li>Can't be obtained through loot</li>
                            @endif
                            @if ($skin->availability == 'Upcoming' || $skin->release_date == '0000-00-00')
                                <li>Not available just yet</li>
                            @endif
                            @if (count($skin->chromas) == 0)
                                <li>No chroma options for variety</li>
                            @endif
                        </ul>
                    </div>
                </div>

                <p>
                    @if ($skin->rp_price <= 975)
                        At just {{ $skin->rp_price }} RP, {{ $skin->skin_name }} offers good value for a visual
                        refresh on {{ $skin->champion->name }}. It's a budget-friendly option if you main this champion
                        or just want to change things up without breaking the bank.
                    @elseif ($skin->rp_price > 975 && $skin->rp_price <= 1350)
                        For {{ $skin->rp_price }} RP, {{ $skin->skin_name }} sits in the mid-range of skin pricing. It
                        offers a solid upgrade from the base skin with enough new features to feel fresh and exciting
                        while playing. {{ $skin->rp_price }} RP is a common price point for skins, so if you want to
                        invest a little more in your {{ $skin->champion->name }} experience, this skin could be a great
                        choice. If {{ $skin->rp_price }} RP is a bit steep, consider checking out our <a
                            href="/sale-rotation" class="text-orange-400 transition-colors hover:text-orange-300">sale
                            rotation page</a> from time to time
                        to see when it goes on sale.
                    @elseif ($skin->rp_price > 1350 && $skin->rp_price != 99999)
                        At {{ $skin->rp_price }} RP, {{ $skin->skin_name }} is definitely higher priced than most
                        skins. But for
                        dedicated {{ $skin->champion->name }} players, the comprehensive changes and high production
                        value make it worth considering if you spend a lot of time on this champion. If you're a casual
                        {{ $skin->champion->name }} player, you might want to wait for a sale or consider other skins
                        that
                        offer a better bang for your buck. To find out when this skin goes on sale, check out our <a
                            href="/sale-rotation" class="text-orange-400 transition-colors hover:text-orange-300">sale
                            rotation page</a>
                    @else
                        With its special availability, {{ $skin->skin_name }} is for the collectors and dedicated
                        {{ $skin->champion->name }} enthusiasts. If you're passionate about this champion or the skin's
                        theme, you'll want to keep an eye out for how to add this to your collection.
                        If you're still looking for a {{ $skin->champion->name }} skin, check out the <a
                            href="/champion/{{ $skin->champion->slug }}#skins"
                            class="text-orange-400 transition-colors hover:text-orange-300">champion
                            page</a> for more options.
                    @endif
                </p>

                <p class="mt-4">
                    Ultimately, skins are about personal preference and how much you enjoy playing
                    {{ $skin->champion->name }}. If you're looking for a fresh experience with this champion and the
                    theme of {{ $skin->skin_name }} appeals to you, it could be the perfect addition to your
                    collection! If you want to consider other options, check out our dedicated <a
                        href="/champion/{{ $skin->champion->slug }}#skins"
                        class="text-orange-400 transition-colors hover:text-orange-300">{{ $skin->champion->name }}</a>
                    page for more {{ $skin->champion->name }} skins and their details.
                </p>
            </div>
        </div>
    </div>
</section>
