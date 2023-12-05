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

    <div class="container mx-auto p-4 flex items-center justify-center mt-3 flex-col text-white">
        <h3 class="text-2xl font-bold text-center text-transparent uppercase sm:text-3xl
        bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text">Champions on Sale</h3>
        @foreach($sales['CHAMPION'] as $sale)
            {{json_encode($sale)}}<br>
            @php
                $champion = Champion::where('champion_id', $sale['id'])->first();
            @endphp
            <br>{{ $champion->name }}<br>
        @endforeach
    </div>
    <div class="container mx-auto p-4 flex items-center justify-center mt-3 flex-col text-white">
        <h3 class="text-2xl font-bold text-center text-transparent uppercase sm:text-3xl
        bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text">Skins on Sale</h3>
        @foreach($sales['CHAMPION_SKIN'] as $sale)
            {{json_encode($sale)}}<br>
        @endforeach
    </div>
</section>
