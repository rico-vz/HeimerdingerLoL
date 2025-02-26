@extends('layouts.app')

@section('title', 'Heimerdinger.LoL • FAQ: Heimerdinger')
@section('description', 'Explore answers to frequently asked questions about Heimerdinger, The Revered Inventor.
 Dive in now!')

@section('content')
    <div class="max-w-screen-xl px-5 mx-auto min-h-sceen">
        <div class="flex flex-col items-center">
            <h1 class="mt-12 text-3xl font-bold text-transparent uppercase sm:text-4xl bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text">
                FAQ • Heimerdinger
            </h1>
            <h2 class="text-lg text-gray-300">
                Frequently Asked Questions about the popular League of Legends champion Heimerdinger.
            </h2>
        </div>
        <div class="flex justify-center my-4">
            <x-ads.horizontal-banner />
        </div>
        <div class="grid max-w-xl mx-auto mt-8 divide-y divide-neutral-700">
            <x-about.faq.dropdown
                question="Is Heimerdinger a yordle?"
                answer="Yes! Heimerdinger is a yordle. He is a yordle inventor in the League of Legends universe. On-top of that he also also our mascot."/>

            <x-about.faq.dropdown
                question="What is Heimerdinger's real name?"
                answer="Heimerdinger's real name is Cecil B. Heimerdinger. He is a yordle inventor in the League of Legends universe."/>

            <x-about.faq.dropdown
                question="Who voices Heimerdinger in Arcane?"
                answer="Heimerdinger in Arcane is voiced by the legendary Mick Wingert."/>

            <x-about.faq.dropdown
                question="What is Heimerdinger his backstory?"
                answer="Heimerdinger is a Yordle, a being from the Spirit Realm. He left Piltover and settled in Zaun, where he saw firsthand the hard, difficult, and often miserable ways of living for the people there. He encountered Ekko, who helped him find a new place and a new way to help people. Heimerdinger is a scientist, inventor, and mechanic, and he is the founder of Piltover and the head of the Council of Clans."/>

            <x-about.faq.dropdown
                question="Who is Heimerdinger named after?"
                answer="Heimersdingers name is a combination of the names of J. Robert Oppenheimer, a physicist known for the atomic bomb, and Erwin Schrödinger, one of the original people behind quantum physics."/>

            <x-about.faq.dropdown
                question="Why does Heimerdinger say 42?"
                answer="Heimerdinger saying '42' is a reference to Douglas Adams' science fiction series, 'The Hitchhiker's Guide to the Galaxy,' where the number 42 is famously described as the 'Answer to the Ultimate Question of Life, the Universe, and Everything.'"/>

            <x-about.faq.dropdown
                question="Is Heimerdinger good?"
                answer="Heimerdinger is currently in an okay spot, around B tier. Right now, there are 5 Heimerdinger OTPs (One Trick Pony: maining a singular champion) in Grandmaster. However none in Challenger."/>

            <x-about.faq.dropdown
                question="Where can Heimerdinger play?"
                answer="Heimerdinger is a versatile champion in League of Legends and can be played in various roles. He is currently mostly played Support however he is also seen in Toplane and Midlane."/>

            <x-about.faq.dropdown
                question="When was Heimerdinger released?"
                answer="Heimerdinger was released on October 10, 2009. He was the 28th champion to be released in League of Legends."/>

            <x-about.faq.dropdown
                question="Should I play Heimerdinger?"
                answer="Heimerdinger is a very fun champion to play. He is a versatile champion that can be played in various roles. He is currently mostly played Support however he is also seen in Toplane and Midlane. If you enjoy playing a champion that can be played in multiple roles, Heimerdinger is a great choice!"/>

            <x-about.faq.dropdown
                question="What core items should I build on Heimerdinger?"
                answer="The most build item by various OTPs is Liandry's Anguish. This is followed by Zhonya's Hourglass."/>

            <x-about.faq.dropdown
                question="Why is Heimerdinger so annoying to play against?"
                answer="Heimerdinger is a very annoying champion to play against. He is a lane bully and can be very oppressive in lane. He is also very good at defending objectives and sieging towers."/>

            <x-about.faq.dropdown
                question="Is Heimerdinger a ranged champion?"
                answer="Yes, Heimerdinger is a ranged champion."/>

            <x-about.faq.dropdown
                question="Is Heimerdinger AD or AP?"
                answer="Heimerdinger is an AP champion. He is mostly played in the botlane as a support. However he can also be played in the toplane and midlane."/>

            <x-about.faq.dropdown
                question="How to get the 'Eureka!' buff on Heimerdinger?"
                answer="When Heimerdinger gets a pentakill he will get the 'Eureka!' buff. This buff is purely cosmetic and does not provide any in-game benefits."/>

            <x-about.faq.dropdown
                question="How to get the 'Harder, Better, Faster, Stronger' buff on Heimerdinger?"
                answer="When Heimerdinger activates his ultimate ability, he will get the 'Harder, Better, Faster, Stronger' buff. This buff is purely cosmetic and does not provide any in-game benefits."/>

            <x-about.faq.dropdown
                question="Why do people refer to Heimerdinger as 'the donger'?"
                answer="The nickname 'Donger' for Heimerdinger, comes from the legendary content creator & player Michael 'Imaqtpie' Santana.
            He also called his Twitch.tv subscribers the 'dongsquad'. The phrase 'Raise Your Dongers' was also often used by his fans. Together with this kaomoji: ヽ༼ຈل͜ຈ༽ﾉ.
            'Donger' as a nickname for Heimerdinger seems to have been adopted as a nickname for Heimerdinger because donger is similar to dinger and Imaqtpie started using it!"/>

            <x-about.faq.dropdown
                question="How do I get the 'Big Brain' emote?"
                answer="The 'Big Brain' emote is a Heimerdinger emote that you can obtain by watching LoL Esports and opting into rewards."/>

            <x-about.faq.dropdown
                question="How do I get the 'Experimentation' emote?"
                answer="The 'Experimentation' emote is a Heimerdinger emote that was obtainable by linking your League of Legends account to Amazon Prime. It's not availabe anymore."/>
        </div>
    </div>
@endsection
