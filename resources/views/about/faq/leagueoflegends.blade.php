@extends('layouts.app')

@section('title', 'Heimerdinger • FAQ: League of Legends')
@section('description', 'Explore answers to frequently asked questions about League of Legends. Dive in now!')

@section('content')
    <div class="max-w-screen-xl px-5 mx-auto min-h-sceen">
        <div class="flex flex-col items-center">
            <h1
                class="mt-12 text-3xl font-bold text-transparent uppercase sm:text-4xl bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text">
                FAQ • League of Legends
            </h1>
            <p class="text-lg text-gray-300">
                Frequently Asked Questions about League of Legends and Riot Games.
            </p>
        </div>
        <div class="grid max-w-xl mx-auto mt-8 divide-y divide-neutral-700">
            <x-about.faq.dropdown question="Is League of Legends on Steam?"
                answer="League of Legends is not available on Steam. It was developed and published by Riot Games and has its own client for downloading and playing the game." />

            <x-about.faq.dropdown question="Is League of Legends hard?"
                answer="Yes, League of Legends is often considered a challenging game, especially for new players." />

            <x-about.faq.dropdown question="Is League of Legends worth playing?"
                answer="Whether League of Legends is worth playing depends on your personal preferences and interests. It's a popular and competitive online multiplayer game, so if you enjoy team-based strategy games and a competitive environment, you might find it worth playing." />

            <x-about.faq.dropdown question="Can League of Legends run on Mac?"
                answer="Yes, unlike VALORANT, League of Legends is available for Mac." />

            <x-about.faq.dropdown question="Can League of Legends Mobile play with PC?"
                answer="No, League of Legends Mobile (also called Wild Rift) and the PC version do not support cross-platform play." />

            <x-about.faq.dropdown question="Can League of Legends run on Linux?"
                answer="No. League of Legends is not playable on Linux. Due to Vanguard on League of Legends. For up to date status & notice see: <a class='underline decoration-orange-500/50' href='https://leagueoflinux.org/status/' target='_blank'>LeagueofLinux Status</a>" />

            <x-about.faq.dropdown question="Is League of Legends dying?"
                answer="No, League of Legends remains a highly popular and actively played game. Against popular believe, League of Legends is actually growing. It is still one of the most popular games ever." />

            <x-about.faq.dropdown question="Will League of Legends come to console?"
                answer="Yes! League of Legends: Wild Rift is planned to come to consoles. There is no set date, however the official website says 'soon'." />

            <x-about.faq.dropdown question="What League of Legends characters are in Arcane?"
                answer="The following League of Legends characters can be seen in Arcane: Vi, Jinx, Ekko, Singed, Caitlyn, Jayce, Heimerdinger and Viktor. A drawing of Teemo is also seen in a flipbook. Not to forget, if you count Teamfight Tactics technically Silco too!" />

            <x-about.faq.dropdown question="When League of Legends season 14 end?"
                answer="Season 14 is predicted to end on January 10, 2025. Season 15 will start the morning after when 15.1 is live." />

                <x-about.faq.dropdown question="When League of Legends season 14 split 2end?"
                answer="Season 14 Split 2 will end on September 24, 2024." />

            <x-about.faq.dropdown question="Is League of Legends Arena mode permanent?"
                answer="No, Arena is not a permanent game mode in League of Legends. However Riot has said they're interested in bringing Arena back very regularly." />

            <x-about.faq.dropdown question="Which League of Legends server should I play on?"
                answer="It's generally recommended to play on the server closest to you. However, if you have the choice between EUW, EUNE, RU & TR the best option would be EU West as it's the biggest and most active. While if you have the option between LAN, LAS & NA the best option is NA for the same reasons." />

            <x-about.faq.dropdown question="Who is Faker from League of Legends?"
                answer="Faker, whose real name is Sang-hyeok Lee, is a renowned professional League of Legends player from South Korea. He is widely considered one of the greatest players in the game's history and has achieved numerous championships with his team, T1 (formerly SK Telecom T1)." />

            <x-about.faq.dropdown question="Are League of Legends servers down?"
                answer="You can check the status of the League of Legends servers on the official Riot Games Service Status page. If the servers are down, you can also check the Riot Games Support Twitter account for updates." />

            <x-about.faq.dropdown question="How to get League of Legends on PC?"
                answer="You can download League of Legends on PC from the official website." />

            <x-about.faq.dropdown question="How to get League of Legends on Mac?"
                answer="You can download League of Legends on Mac from the official website." />

            <x-about.faq.dropdown question="How to get League of Legends on Android?"
                answer="You can download League of Legends: Wild Rift on Android from the Google Play Store." />

            <x-about.faq.dropdown question="How to get League of Legends on iOS?"
                answer="You can download League of Legends: Wild Rift on iOS from the App Store." />

            <x-about.faq.dropdown question="Is Riot Games owned by China?"
                answer="No, Riot Games is not owned by China. Riot Games is owned by Tencent, a Chinese multinational conglomerate holding company." />

            <x-about.faq.dropdown question="Is League of Legends free?"
                answer="Yes, League of Legends is free to play. You can download the game for free and play it without spending any money. However, there are in-game purchases available for cosmetics and other items. These are totally optional and don't provide any advantage." />

            <x-about.faq.dropdown question="Is League of Legends pay to win?"
                answer="No, League of Legends is not pay to win. You can't buy any items that provide an advantage over other players. The only things you can buy are cosmetics and other items that don't provide any advantage." />

            <x-about.faq.dropdown question="Is League of Legends cross-platform?"
                answer="No, League of Legends is not cross-platform. You can only play with players on the same platform as you. However, League of Legends: Wild Rift is planned to be cross-platform. So Mobile players will be able to play with console players in the future." />

            <x-about.faq.dropdown question="Can I cheat in League of Legends?"
                answer="No, you aren't allowed cheat in League of Legends. Riot Games has a zero-tolerance policy for cheating and will ban any accounts that are found to be cheating." />

            <x-about.faq.dropdown question="Can I sell my League of Legends account?"
                answer="No, you can't sell your League of Legends account. It is against the Terms of Service to sell your account. If you do, your account will be banned." />

            <x-about.faq.dropdown question="Can I change my League of Legends username?"
                answer="No, you can't change your actual username." />

            <x-about.faq.dropdown question="Can I change my League of Legends region?"
                answer="Yes, you can change your region. You can purchase a region transfer in the in-game store." />

            <x-about.faq.dropdown question="How do I get Victorious Tryndamere in League of Legends?"
                answer="Victorious Tryndamere was an award given to players who actively played ranked in Season 13. Each rank has its own chroma." />
        </div>
    </div>
@endsection
