<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/img/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/icons/favicon-16x16.png">
    <link rel="manifest" href="/img/icons/site.webmanifest">
    <link rel="mask-icon" href="/img/icons/safari-pinned-tab.svg" color="#e6855e">
    <link rel="shortcut icon" href="/img/icons/favicon.ico">
    <meta name="msapplication-TileColor" content="#ff7c47">
    <meta name="msapplication-config" content="/img/icons/browserconfig.xml">
    <meta name="theme-color" content="#ff7c47">

    <title>Heimerdinger.LoL • About</title>
    <meta name="description"
          content="What is League of Legends? Who is Heimerdinger? What is Heimerdinger.LoL? Explore answers to frequently asked questions about League of Legends, Heimerdinger and us. Dive in now!">

    <!-- OpenGraph -->
    <meta property="og:site_name" content="Heimerdinger.LoL">
    <meta property="og:title" content="Heimerdinger.LoL • About">
    <meta property="og:description"
          content="What is League of Legends? Who is Heimerdinger? What is Heimerdinger.LoL? Explore answers to frequently asked questions about League of Legends, Heimerdinger and us. Dive in now!">
    <meta property="og:locale" content="en">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{asset('img/og_image.png')}}">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="heimerdinger.lol">
    <meta property="twitter:title" content="Heimerdinger.LoL • About">
    <meta property="twitter:description"
          content="What is League of Legends? Who is Heimerdinger? What is Heimerdinger.LoL? Explore answers to frequently asked questions about League of Legends, Heimerdinger and us. Dive in now!">
    <meta property="twitter:image" content="{{asset('img/og_image.png')}}">

    <link rel="preconnect" href="https://rsms.me/">
    <link rel="preload" href="https://rsms.me/inter/inter.css" as="style">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" media="print" onload="this.media='all'">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased bg-stone-900 dark scroll-smooth">
<x-navbar/>

<div class="max-w-screen-xl mx-auto px-5 min-h-sceen">
    <div class="flex flex-col items-center">
        <h1
            class="mt-7 text-3xl font-bold text-center text-transparent uppercase sm:text-4xl
        bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text">
            About</h1>
        <h2
            class="text-lg font-bold text-center text-transparent uppercase
        bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text ">
            Learn all about League of Legends, Heimerdinger and us.</h2>
    </div>

    <div class="flex justify-center items-center mt-2">
        <a href="{{route('about.faq.heimerdinger')}}"
           class="bg-orange-500 text-white font-bold py-2 px-4 rounded hover:bg-orange-600 mr-3">FAQ • Heimerdinger</a>
        <a href="{{route('about.faq.leagueoflegends')}}"
           class="bg-orange-500 text-white font-bold py-2 px-4 rounded hover:bg-orange-600">FAQ • League of Legends</a>


    </div>
</div>

<x-footer/>
</body>
</html>
