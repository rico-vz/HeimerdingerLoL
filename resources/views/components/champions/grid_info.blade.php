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
        <div class="w-screen grid grid-cols-1 md-grid-cols-2 lg:grid-cols-3 grid-rows-5 gap-5">
            <div class="relative rounded-2xl bg-stone-800/40 border border-neutral-300/5 shadow-sm shadow-stone-800/80 lg:col-span-2 lg:row-span-2">
                <div class="glow-shadow absolute inset-0 rounded-2xl"></div>
                <div class="overflow-hidden rounded-2xl relative">
                    <img
                        src="//wsrv.nl/?url={{ $champion->getChampionImageAttribute(false) }}&w=880&output=webp&q=85"
                        alt="{{$champion->name}} Splash Art"
                        class="w-full h-full object-cover transform scale-100 transition-transform duration-700 hover:scale-105 z-10"
                    >
                </div>
            </div>


            <div
                class="rounded-2xl bg-stone-800/40 border border-stone-800 shadow-sm
                shadow-stone-800/80 lg:row-span-2 lg:col-start-3 hover:shadow-orange-500/20">
                5</div>
            <div class="rounded-2xl bg-stone-800/40 border border-stone-800 shadow-sm
            shadow-stone-800/80 lg:row-start-3 hover:shadow-orange-500/20">8
            </div>
            <div
                class="rounded-2xl bg-stone-800/40 border border-stone-800 shadow-sm
                shadow-stone-800/80 lg:col-span-2 lg:row-start-3 hover:shadow-orange-500/20">
                9</div>
        </div>
    </div>
</section>
