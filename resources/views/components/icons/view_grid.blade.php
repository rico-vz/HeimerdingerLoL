<section class="min-h-[80vh] flex items-center justify-center">
    <div class="items-center justify-center mx-auto my-auto align-middle">
        <h3
            class="text-sm font-bold text-center text-transparent uppercase sm:text-md bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text">
            ICON DETAILS</h3>
        <h1
            class="text-3xl font-bold text-center text-transparent uppercase sm:text-4xl bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text">
            {{ $icon->title }}</h1>
        <h2
            class="text-sm font-bold text-center text-transparent uppercase md:text-lg bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text">
            Released in: {{ $icon->release_year }}</h2>

        <div class="flex justify-center my-4">
            <x-ads.horizontal-banner />
        </div>

        <div class="container flex items-center justify-center p-4 mx-auto my-auto mt-3">
            <div class="grid w-screen grid-cols-1 gap-8 md:grid-cols-2">
                <div
                    class="flex flex-col items-center align-middle border shadow-sm rounded-2xl bg-stone-800/40 border-neutral-300/5 shadow-stone-800/80">
                    <h4 class="text-center text-2xl font-semibold text-neutral-100 uppercase mt-3.5 shadow-sm mb-3">
                        The {{ $icon->title }}</h4>
                    <img src="//wsrv.nl/?url={{ $icon->image }}&w=400&output=webp&q=100&il"
                        alt="{{ $icon->title }} Icon"
                        class="transition-transform duration-700 border-2 shadow-md rounded-2xl bg-clip-border border-orange-400/40 shadow-orange-400/20" />
                    <a href="{{ $icon->image }}" rel="noopener" target="_blank"
                        class="px-4 py-2 text-sm font-medium text-center text-neutral-100">
                        View in HD
                    </a>
                </div>

                <div class="border shadow-sm rounded-2xl bg-stone-800/40 border-neutral-300/5 shadow-stone-800/80">
                    <h4 class="text-center text-lg font-semibold text-neutral-100 uppercase mt-3.5 shadow-sm mx-2">
                        {{ $icon->title }} Details
                    </h4>
                    <div class="flex flex-col justify-between h-max">
                        <ul class="flex-1 mx-5 h-max">
                            <li class="items-center text-base leading-loose text-neutral-100 hyphens-auto"
                                lang="en">
                                <span class="font-bold">Icon ID:</span>
                                <span class="font-mono font-semibold">{{ $icon->icon_id }}</span>
                            </li>
                            <li class="items-center text-base font-medium leading-loose text-neutral-100 hyphens-auto"
                                lang="en">
                                <span class="font-bold">Icon Name:</span> {{ $icon->title }}
                            </li>
                            <li class="items-center text-base font-medium leading-loose text-neutral-100 hyphens-auto"
                                lang="en">
                                <span class="font-bold">Release Year:</span> {{ $icon->release_year }}
                            </li>
                            <li class="items-center text-base font-medium leading-loose text-neutral-100 hyphens-auto"
                                lang="en">
                                <span class="font-bold">Legacy<span class="font-extralight">*</span>:</span>
                                {{ $icon->legacy ? 'Yes' : 'No' }}
                            </li>
                            <li class="items-center text-base font-medium leading-loose text-neutral-100 hyphens-auto"
                                lang="en">
                                <span class="font-bold">Esports Icon:</span>
                                {{ $icon->esports_team || $icon->esports_region || $icon->esports_event ? 'Yes' : 'No' }}
                            </li>
                            @if ($icon->esports_team || $icon->esports_region || $icon->esports_event)
                                @if ($icon->esports_team)
                                    <li class="items-center text-base font-medium leading-loose text-neutral-100 hyphens-auto"
                                        lang="en">
                                        <span class="font-bold">Esports Team:</span> {{ $icon->esports_team }}
                                    </li>
                                @endif
                                @if ($icon->esports_region)
                                    <li class="items-center text-base font-medium leading-loose text-neutral-100 hyphens-auto"
                                        lang="en">
                                        <span class="font-bold">Esports Region:</span> {{ $icon->esports_region }}
                                    </li>
                                @endif
                                @if ($icon->esports_event)
                                    <li class="items-center text-base font-medium leading-loose text-neutral-100 hyphens-auto"
                                        lang="en">
                                        <span class="font-bold">Esports Event:</span> {{ $icon->esports_event }}
                                    </li>
                                @endif
                            @endif
                            <li class="items-center text-base font-medium leading-loose text-neutral-100 hyphens-auto"
                                lang="en">
                                <span class="font-bold">Description:</span> {{ $icon->description }}
                            </li>

                            @if ($icon->icon_id === 6584)
                                <li class="items-center text-base font-medium leading-loose text-neutral-100 hyphens-auto"
                                    lang="en">
                                    <span class="font-bold">Guide:</span> <a
                                        href="https://heimerdinger.lol/post/how-to-get-hatty-crabby-icon-in-league-of-legends"
                                        class="underline hover:text-orange-400 decoration-orange-400">How to get the
                                        Hatty Crabby Icon in
                                        League of Legends</a>
                                </li>
                            @endif

                            <li class="items-center mt-8 text-sm font-light leading-loose text-neutral-100 hyphens-auto"
                                lang="en">
                                <span class="font-bold">* Legacy Icons:</span> Legacy Icons don't act the same as legacy
                                skins.
                                It seems like some icons that are marked as legacy are still obtainable or the other way
                                around
                                where some icons that are not marked as legacy are not obtainable anymore.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
