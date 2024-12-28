<?php
/** @var App\Models\Champion $champion */
/** @var App\Models\ChampionRoles $roles */
?>

<div class="relative">
    <!-- Left Ad Container -->
    <div class="fixed hidden w-64 2xl:block left-4 top-24">
        <div class="p-4 border rounded-lg bg-stone-800/40 border-stone-800">
            <ins class="adsbygoogle"
                style="display:block"
                data-ad-client="ca-pub-4505764048662657"
                data-ad-slot="3924622540"
                data-ad-format="vertical"
                data-full-width-responsive="false"></ins>

            <div class="hidden adblock-message">
                <p class="mt-4 text-sm text-center text-orange-400">Hey! We rely on ads to keep our servers running.</p>
                <p class="mt-2 text-xs text-center text-gray-400">Please consider supporting us by disabling your ad blocker.</p>
            </div>
        </div>
    </div>

    <!-- Right Ad Container -->
    <div class="fixed hidden w-64 2xl:block right-4 top-24">
        <div class="p-4 border rounded-lg bg-stone-800/40 border-stone-800">
            <ins class="adsbygoogle"
                style="display:block"
                data-ad-client="ca-pub-4505764048662657"
                data-ad-slot="3924622540"
                data-ad-format="vertical"
                data-full-width-responsive="false"></ins>

            <div class="hidden adblock-message">
                <p class="mt-4 text-sm text-center text-orange-400">Hey! We rely on ads to keep our servers running.</p>
                <p class="mt-2 text-xs text-center text-gray-400">Please consider supporting us by disabling your ad blocker.</p>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <section class="max-w-5xl mx-auto mt-12">
        <h1 class="text-3xl font-bold text-center text-transparent uppercase sm:text-4xl bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text">
            Champions
        </h1>

        <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-4505764048662657" data-ad-slot="7031271888"
            data-ad-format="auto" data-full-width-responsive="true"></ins>

        <div class="flex justify-center items-center mx-auto max-w-5xl mt-2.5">
            <x-champions.lane-selector class="text-center" />
        </div>

        <div class="container flex items-center justify-center p-4 mx-auto mt-3">
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($champions as $key => $champion)
                    <div class="champ-card flex flex-col text-gray-700 bg-stone-800/40 shadow-md rounded-2xl bg-clip-border
                        border border-stone-800 hover:border-orange-500/10 hover:shadow-orange-500/10 @foreach ($roles[$key]->roles as $lane) POS-{{ $lane }} @endforeach">
                        <div class="mx-4 mt-4 overflow-hidden border-2 rounded-2xl bg-clip-border border-orange-400/40">
                            <div class="aspect-w-4 aspect-h-3">
                                <a href="/champion/{{ $champion->slug }}">
                                    <img
                                        @if ($key < 8) loading="eager" @else loading="lazy" @endif
                                        src="//wsrv.nl/?url={{ $champion->getChampionImageAttribute() }}&w=380&h=285&output=webp&q=65&il"
                                        class="object-cover w-full h-full"
                                        alt="{{ $champion->name }} Splash Art"
                                    />
                                </a>
                            </div>
                        </div>

                        <div class="px-4 py-2">
                            <div class="flex items-center justify-between">
                                <p class="block text-base antialiased font-medium text-gray-100">
                                    <a href="/champion/{{ $champion->slug }}">
                                        {{ $champion->name }}
                                    </a>
                                </p>
                                <span class="text-xs text-stone-300">{{ $champion->title }}</span>
                            </div>

                            <div class="flex items-center mt-2">
                                <p class="flex text-sm text-gray-300">
                                    @foreach ($roles[$key]->roles as $lane)
                                        <span class="sr-only">{{ $lane }}</span>
                                        <img
                                            {{ Popper::arrow('translucent')->theme('dark')->position('bottom')->pop($lane) }}
                                            @if ($key < 8) loading="auto" @else loading="lazy" @endif
                                            src="{{ getRoleIcon($lane) }}"
                                            alt="{{ $lane }} Icon"
                                            class="mr-1 w-7 h-7"
                                        >
                                    @endforeach
                                </p>

                                <div class="flex items-end justify-end w-full justify-items-end">
                                    <p class="text-2xl text-right text-orange-300 md:text-lg hover:text-orange-400">
                                        <a href="/champion/{{ $champion->slug }}" aria-label="[Detailed {{ $champion->name }} info...]">
                                            <x-iconsax-bul-arrow-right class="w-8 transition-colors" />
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>

<!-- Script to detect adblock and show message -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    setTimeout(function() {
        const adElements = document.getElementsByClassName('adsbygoogle');
        const adblockMessages = document.getElementsByClassName('adblock-message');

        for (let i = 0; i < adElements.length; i++) {
            if (adElements[i].clientHeight === 0) {
                // Ads are blocked, show messages
                for (let j = 0; j < adblockMessages.length; j++) {
                    adblockMessages[j].classList.remove('hidden');
                }
                break;
            }
        }
    }, 2000);
});
</script>
