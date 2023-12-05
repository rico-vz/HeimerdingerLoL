@php
    use App\Models\Champion;
    use App\Models\ChampionSkin;
@endphp

<section class="max-w-screen-xl mx-auto mt-12">
    <h1
        class="text-3xl font-bold text-center text-transparent uppercase sm:text-4xl
        bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text">
        Sale Rotation</h1>
    <h2 class="text-lg font-bold text-center text-transparent uppercase sm:text-xl
        bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text">All champions & skins on sale</h2>

    <h3 class="mt-8 mb-2 text-2xl font-bold text-center text-transparent uppercase sm:text-3xl
        bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text">Champions on Sale</h3>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($sales['CHAMPION'] as $sale)
            @php
                $champion = Champion::where('champion_id', $sale['id'])->first();
                $originalPrice = $sale['prices'][0]['originalPrice']['cost'];
                $discountedPrice = $sale['prices'][0]['discount']['discountedProductPrice']['cost'];
                $discountPercentage = round((1 - ($discountedPrice / $originalPrice)) * 100);
            @endphp
        <a href="/champion/{{$champion->slug}}">
            <div
                class="flex flex-col text-gray-700 bg-stone-800/40 shadow-md rounded-2xl bg-clip-border
                    border border-stone-800 hover:border-orange-500/10 hover:shadow-orange-500/10 items-center">
                <div class="absolute mt-4 rounded-full bg-black/60 px-3 py-1 text-white">
                    {{ $discountPercentage }}% Off
                </div>
                <div
                    class="mx-4 overflow-hidden w-auto rounded-2xl bg-clip-border border-2 border-orange-400/40 mt-3
                    aspect-video">
                    <img
                        src="//wsrv.nl/?url={{ $champion->getChampionImageAttribute() }}&w=450&output=webp&q=80&il&default=ssl:wsrv.nl%2F%3Furl%3Dhttps://i.ibb.co/5s6YyvN/aaaa.png"
                        class="aspect-video"
                        alt="{{ $champion->name }} Splash Art"
                    />

                </div>
                <div class="px-4 py-2">
                    <div class="flex">
                        <p class="block text-sm antialiased font-medium text-gray-100 text-left">
                            <span class="text-orange-400 font-bold">{{ $champion->name }}</span> •
                            {{ $discountedPrice }} RP
                        </p>
                    </div>
                </div>
            </div>
        </a>
        @endforeach
    </div>


    <h3 class="text-2xl font-bold text-center text-transparent uppercase sm:text-3xl
        bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text mt-8">Skins on Sale</h3>
    <div class="container mx-auto p-4 flex items-center justify-center flex-col text-white">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($sales['CHAMPION_SKIN'] as $sale)
                @php
                    $skin = ChampionSkin::where('full_skin_id', $sale['id'])->first();
                    $originalPrice = $sale['prices'][0]['originalPrice']['cost'];
                    $discountedPrice = $sale['prices'][0]['discount']['discountedProductPrice']['cost'];
                    $discountPercentage = round((1 - ($discountedPrice / $originalPrice)) * 100);
                @endphp
            <a href="/skin/{{ $skin->slug }}">
                <div
                    class="flex flex-col text-gray-700 bg-stone-800/40 shadow-md rounded-2xl bg-clip-border
                    border border-stone-800 hover:border-orange-500/10 hover:shadow-orange-500/10 items-center">
                    <div class="absolute mt-4 rounded-full bg-black/60 px-3 py-1 text-white">
                        {{ $discountPercentage }}% Off
                    </div>
                    <div
                        class="mx-4 overflow-hidden w-auto rounded-2xl bg-clip-border border-2 border-orange-400/40 mt-3
                    aspect-video">
                        <img
                            src="//wsrv.nl/?url={{ $skin->getSkinImageAttribute() }}&w=450&output=webp&q=80&il&default=ssl:wsrv.nl%2F%3Furl%3Dhttps://i.ibb.co/5s6YyvN/aaaa.png"
                            class="aspect-video"
                            alt="{{ $skin->skin_name }} Splash Art"
                        />

                    </div>
                    <div class="px-4 py-2">
                        <div class="flex">
                            <p class="block text-sm antialiased font-medium text-gray-100 text-left">
                                <span class="text-orange-400 font-bold">{{ $skin->skin_name }}</span> •
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
