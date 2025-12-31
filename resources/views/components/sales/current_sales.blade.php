@php
    use App\Models\Champion;
    use App\Models\ChampionSkin;
@endphp

<section class="max-w-screen-xl mx-auto mt-12">

    <h1
        class="text-3xl font-bold text-center text-transparent uppercase sm:text-4xl bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text">
        Sale Rotation</h1>
    <h2
        class="text-lg font-bold text-center text-transparent uppercase sm:text-xl bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text">
        All champions & skins on sale</h2>

    <h3
        class="mt-8 mb-2 text-2xl font-bold text-center text-transparent uppercase sm:text-3xl bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text">
        Champions on Sale</h3>

    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
        @foreach ($sales['champion_sales'] as $sale)
            @php
                $champion = Champion::where('champion_id', $sale['item_id'])->first();
                $discountPercentage = $sale['percent_off'];
                $discountedPrice = $sale['rp'];
            @endphp
            <a href="/champion/{{ $champion->slug }}">
                <div
                    class="flex flex-col items-center text-gray-700 border shadow-md bg-stone-800/40 rounded-2xl bg-clip-border border-stone-800 hover:border-orange-500/10 hover:shadow-orange-500/10">
                    <div class="absolute px-3 py-1 mt-4 text-white rounded-full bg-black/60">
                        {{ $discountPercentage }}% Off
                    </div>
                    <div
                        class="w-auto mx-4 mt-3 overflow-hidden border-2 rounded-2xl bg-clip-border border-orange-400/40 aspect-video">
                        <img src="//wsrv.nl/?url={{ $champion->getChampionImageAttribute() }}&w=450&output=webp&q=80&il&default=ssl:wsrv.nl%2F%3Furl%3Dhttps://i.ibb.co/5s6YyvN/aaaa.png"
                            class="aspect-video" alt="{{ $champion->name }} Splash Art" />

                    </div>
                    <div class="px-4 py-2">
                        <div class="flex">
                            <p class="block text-sm antialiased font-medium text-left text-gray-100">
                                <span class="font-bold text-orange-400">{{ $champion->name }}</span> •
                                {{ $discountedPrice }} RP
                            </p>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach

    </div>

    <h3
        class="mt-8 text-2xl font-bold text-center text-transparent uppercase sm:text-3xl bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text">
        Skins on Sale</h3>
    <div class="container flex flex-col items-center justify-center p-4 mx-auto text-white">
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($sales['skin_sales'] as $sale)
                @php
                    $skin = ChampionSkin::where('full_skin_id', $sale['item_id'])->first();
                    $discountPercentage = $sale['percent_off'];
                    $discountedPrice = $sale['rp'];
                @endphp
                <a href="/skin/{{ $skin->slug }}">
                    <div
                        class="flex flex-col items-center text-gray-700 border shadow-md bg-stone-800/40 rounded-2xl bg-clip-border border-stone-800 hover:border-orange-500/10 hover:shadow-orange-500/10">
                        <div class="absolute px-3 py-1 mt-4 text-white rounded-full bg-black/60">
                            {{ $discountPercentage }}% Off
                        </div>
                        <div
                            class="w-auto mx-4 mt-3 overflow-hidden border-2 rounded-2xl bg-clip-border border-orange-400/40 aspect-video">
                            <img src="//wsrv.nl/?url={{ $skin->getSkinImageAttribute() }}&w=450&output=webp&q=80&il&default=ssl:wsrv.nl%2F%3Furl%3Dhttps://i.ibb.co/5s6YyvN/aaaa.png"
                                class="aspect-video" alt="{{ $skin->skin_name }} Splash Art" />

                        </div>
                        <div class="px-4 py-2">
                            <div class="flex">
                                <p class="block text-sm antialiased font-medium text-left text-gray-100">
                                    <span class="font-bold text-orange-400">{{ $skin->skin_name }}</span> •
                                    {{ $discountedPrice }} RP
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>



</section>