@extends('layouts.app')

@section('title', 'Heimerdinger.LoL • About')
@section('description', 'What is League of Legends? Who is Heimerdinger? What is Heimerdinger.LoL? Explore answers to
frequently asked questions about League of Legends, Heimerdinger and us. Dive in now!')

@section('content')
    <div class="max-w-screen-xl px-5 mx-auto min-h-sceen">
        <div class="flex flex-col items-center">
            <h1
                class="text-3xl font-bold text-center text-transparent uppercase mt-7 sm:text-4xl bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text">
                About</h1>
            <h2
                class="text-lg font-bold text-center text-transparent uppercase bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text ">
                Learn all about League of Legends, Heimerdinger and us.</h2>
        </div>

        <div class="flex items-center justify-center mt-2">
            <a href="{{route('about.faq.heimerdinger')}}"
               class="px-4 py-2 mr-3 font-bold text-white bg-orange-500 rounded hover:bg-orange-600">FAQ •
                Heimerdinger</a>
            <a href="{{route('about.faq.leagueoflegends')}}"
               class="px-4 py-2 font-bold text-white bg-orange-500 rounded hover:bg-orange-600">FAQ • League of
                Legends</a>
        </div>

        <div class="flex flex-col items-center justify-center mt-5 ">
            <h2
                class="text-lg font-bold text-center text-gray-100 uppercase">
                What is League of Legends?</h2>
            <p class="max-w-3xl mt-2 text-center text-stone-300">
                League of Legends (LoL), commonly referred to as League, is a MOBA game developed and published by Riot
                Games. The game was inspired by DoTA, a custom map for
                Warcraft III, and was released in October 2009. Since its release, League has been free-to-play and is
                monetized through purchasable skins which provide no competitive advantage.
                The game is available for Windows and macOS as "League of Legends" and for mobile devices as "Wild
                Rift".
                <br><br>
                In the game, two teams of five players battle, each team defending their half of the map. All of the
                players control a champion, with
                unique abilities and playstyles. During a match, champions become more powerful by collecting
                exp, earning gold, and purchasing items to defeat the opposing team. In League's main mode,
                Summoner's Rift, a team wins by pushing through to the enemy base and destroying their Nexus.
                <br><br>
                League of Legends is the world's largest esport, with an international competitive scene consisting of
                multiple regional leagues; they all come together in an annual League of Legends World Championship. The
                2023 World Championship had over 6 million concurrent unique viewers. Which happened during the finals
                of
                WBG vs T1. Domestic and international events have been broadcast on livestreaming websites such as
                Twitch, YouTube, Trovo and Bilibili.
                <br><br>
                Aside from its main game mode, League of Legends also offers other game modes like ARAM ("All Random,
                All
                Mid") and Teamfight Tactics. ARAM is a 5v5 mode on a single-lane map, with champions randomly
                given to players. Teamfight Tactics is an auto-battler/autochess game mode where players build a team
                and
                battle to
                be the last one standing and gain LP.
                <br><br>
                The game and its lores success has led to the development of several spin-off games licensed by Riot
                Games
                and media tie-ins, including music, comic books, short stories, and a loved animated series called
                Arcane.
                Which boasts a 100% rating on Rotten Tomatoes, 9/10 on IMDB, 10/10 on IGN and a 97/100 on Google
                Reviews.
            </p>
        </div>
        <hr class="w-48 h-1 mx-auto my-4 border-0 rounded md:my-10 bg-stone-500">
        <div class="flex flex-col items-center mt-5">
            <h2
                class="text-lg font-bold text-center text-gray-100 uppercase">
                What is Heimerdinger.lol?</h2>
            <p class="max-w-3xl mt-2 text-center text-stone-300">
                Heimerdinger.lol is a website dedicated to providing information about League of Legends and its events.
                We provide in-depth information about the champions, skins, game assets, and more.
                <br><br>
                Heimerdinger.lol is a fan-made website and created + ran by one person. Heimerdinger.lol is free to use
                and
                will
                always be free to use. We currently do not run ads on our website. We are not affiliated with Riot Games
                in
                any way. We are just a fan of League of Legends and
                created this website to help other fans while also learning and practicing our skills. We hope you enjoy
                using our website as much as we enjoy creating it. Heimerdinger.lol is completely open-source, so if you
                are a developer and want to contribute to the project, you can do so.
                <br><br>
                I am always looking for ways to improve this website. If you have any suggestions, feedback, or just
                want to
                say hi, you can do so by contacting me through the contact form on <a
                    href="/contact" class="underline decoration-orange-500/50" rel="noopener" target="_blank">this
                    website</a>. I will try to respond as soon as possible.
            </p>
        </div>
        <hr class="w-48 h-1 mx-auto my-4 border-0 rounded md:my-10 bg-stone-500">
        <div class="flex flex-col items-center mt-5">
            <h2
                class="text-lg font-bold text-center text-gray-100 uppercase">
                Who is Heimerdinger?</h2>
            <p class="max-w-3xl mt-2 text-center text-stone-300">
                Heimerdinger is a character from the game. He is a brilliant
                scientist, Professor Cecil B. Heimerdinger, which is his full name, is one of the most innovative and
                esteemed inventors
                the lore region called Piltover has ever known. He is relentless in his work to the point of neurotic
                obsession, thriving on
                answering the universe's most impenetrable questions. Despite his theories often appearing opaque and
                esoteric, Heimerdinger has crafted some of Piltover's most miraculous—not to mention lethal—machinery,
                and
                constantly tinkers with his inventions to make them even more efficient.
                <br><br>
                In terms of gameplay, Heimerdinger is a mage. He builds magic damage. His abilities include laying down
                a rapid-fire cannon turret, firing long-range rockets, lobbing a grenade at a
                location, and upgrading his next spell to have increased effects.
                <br><br>
                Heimerdinger is also a prominent character in Arcane. In the series, he is a brilliant but eccentric
                scientist who stands among one of the best
                inventors Piltover has ever seen. He not only teaches
                at the Piltover Academy but also holds a position among council members. He looks different from the
                rest of
                the characters in Arcane because he is a Yordle.
                <br><br>
                In Arcane, Heimerdinger has emerged as a beloved and complex character, captivating fans with his
                intelligence, creativity, and moral compass. His unique background, expertise in science, and
                commitment to ethical progress have made him an essential part of the series, offering both wisdom and
                intrigue to the unfolding story of Arcane. So I'm sure we will be seeing him again in Arcane Season 2.
            </p>
        </div>
    </div>
@endsection
