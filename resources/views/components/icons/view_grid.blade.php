<section class="max-w-screen-xl mx-auto mt-12">
    <p class="sr-only">Heimerdinger Presents:</p>
    <h3
        class="text-sm font-bold text-center text-transparent uppercase sm:text-md
        bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text">
        ICON DETAILS</h3>
    <h1
        class="text-3xl font-bold text-center text-transparent uppercase sm:text-4xl
        bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text">
        {{$icon->title}}</h1>
    <h2
        class="text-sm md:text-lg font-bold text-center text-transparent uppercase
        bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text">
        Released in: {{$icon->release_year}}</h2>

    <div class="container mx-auto p-4 flex items-center justify-center mt-3">
        <div class="w-screen grid grid-cols-1 md:grid-cols-2 gap-8">

            <div
                class="items-center align-middle flex flex-col rounded-2xl bg-stone-800/40 border border-neutral-300/5 shadow-sm shadow-stone-800/80">
                <h4 class="text-center text-2xl font-semibold text-neutral-100 uppercase mt-3.5 shadow-sm mb-3">
                    The {{$icon->title}}</h4>
                <img
                    src="//wsrv.nl/?url={{ $icon->image }}&w=400&output=webp&q=100&il"
                    alt="{{$icon->title}} Icon"
                    class="transition-transform duration-700 rounded-2xl bg-clip-border border-2 border-orange-400/40
                    shadow-md shadow-orange-400/20"/>
                <a href="{{$icon->image}}" target="_blank"
                   class="text-center text-neutral-100 text-sm font-medium px-4 py-2">
                    View in HD
                </a>
            </div>

            <div class="rounded-2xl bg-stone-800/40 border border-neutral-300/5 shadow-sm shadow-stone-800/80">
                <h4 class="text-center text-lg font-semibold text-neutral-100 uppercase mt-3.5 shadow-sm mx-2">
                    {{$icon->title}} Details
                </h4>
                <div class="flex flex-col justify-between h-max">
                    <ul class="mx-5 flex-1  h-max">
                        <li class="text-neutral-100 hyphens-auto text-base leading-loose items-center" lang="en">
                            <span class="font-bold">Icon ID:</span>
                            <span class="font-mono font-semibold">{{$icon->icon_id}}</span>
                        </li>
                        <li class="text-neutral-100 hyphens-auto text-base font-medium leading-loose items-center" lang="en">
                            <span class="font-bold">Icon Name:</span> {{$icon->title}}
                        </li>
                        <li class="text-neutral-100 hyphens-auto text-base font-medium leading-loose items-center" lang="en">
                            <span class="font-bold">Release Year:</span> {{$icon->release_year}}
                        </li>
                        <li class="text-neutral-100 hyphens-auto text-base font-medium leading-loose items-center" lang="en">
                            <span class="font-bold">Legacy<span class="font-extralight">*</span>:</span> {{$icon->legacy ? 'Yes' : 'No'}}
                        </li>
                        <li class="text-neutral-100 hyphens-auto text-base font-medium leading-loose items-center" lang="en">
                            <span class="font-bold">Esports Icon:</span> {{$icon->esports_team || $icon->esports_region || $icon->esports_event ? 'Yes' : 'No'}}
                        </li>
                        @if($icon->esports_team || $icon->esports_region || $icon->esports_event)
                            @if($icon->esports_team)
                                <li class="text-neutral-100 hyphens-auto text-base font-medium leading-loose items-center" lang="en">
                                    <span class="font-bold">Esports Team:</span> {{$icon->esports_team}}
                                </li>
                            @endif
                            @if($icon->esports_region)
                                <li class="text-neutral-100 hyphens-auto text-base font-medium leading-loose items-center" lang="en">
                                    <span class="font-bold">Esports Region:</span> {{$icon->esports_region}}
                                </li>
                            @endif
                            @if($icon->esports_event)
                                <li class="text-neutral-100 hyphens-auto text-base font-medium leading-loose items-center" lang="en">
                                    <span class="font-bold">Esports Event:</span> {{$icon->esports_event}}
                                </li>
                            @endif
                        @endif
                        <li class="text-neutral-100 hyphens-auto text-base font-medium leading-loose items-center" lang="en">
                            <span class="font-bold">Description:</span> {{$icon->description}}
                        </li>
                        <li class="text-neutral-100 hyphens-auto font-light text-sm leading-loose items-center mt-8" lang="en">
                            <span class="font-bold">* Legacy Icons:</span> Legacy Icons don't act the same as legacy skins.
                            It seems like some icons that are marked as legacy are still obtainable or the other way around
                            where some icons that are not marked as legacy are not obtainable anymore.
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>
1
