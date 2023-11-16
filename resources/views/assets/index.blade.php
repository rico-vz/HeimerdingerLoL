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

    <title>Heimerdinger.LoL • Assets</title>
    <meta name="description"
          content="Explore all champion skins on Heimerdinger.LoL. Find detailed information on popular skins such as Dark Cosmic Jhin, HEARTSTEEL Ezreal, PROJECT: Vayne and more!">

    <!-- OpenGraph -->
    <meta property="og:site_name" content="Heimerdinger.LoL">
    <meta property="og:title" content="Heimerdinger.LoL • Skins">
    <meta property="og:description"
          content="Explore all champion skins on Heimerdinger.LoL. Find detailed information on popular skins such as Dark Cosmic Jhin, HEARTSTEEL Ezreal, PROJECT: Vayne and more!">
    <meta property="og:locale" content="en">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{asset('img/og_image.png')}}">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="heimerdinger.lol">
    <meta property="twitter:title" content="Heimerdinger.LoL • Skins">
    <meta property="twitter:description"
          content="Explore all champion skins on Heimerdinger.LoL. Find detailed information on popular skins such as Dark Cosmic Jhin, HEARTSTEEL Ezreal, PROJECT: Vayne and more!">
    <meta property="twitter:image" content="{{asset('img/og_image.png')}}">

    <link rel="preconnect" href="https://rsms.me/">
    <link rel="preload" href="https://rsms.me/inter/inter.css" as="style">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" media="print" onload="this.media='all'">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased bg-stone-900 dark scroll-smooth flex flex-col min-h-screen">
<x-navbar/>
<h1
    class="mt-7 text-3xl font-bold text-center text-transparent uppercase sm:text-4xl
        bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text">
    Assets</h1>
<h2
    class="text-lg font-bold text-center text-transparent uppercase
        bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text ">
    LoL Icons & Emotes</h2>


<div class="container mx-auto p-4 flex items-center justify-center mt-3 flex-grow">
    <div class="text-center items-center justify-center align-middle">
        <img class="items-center mx-auto" src="{{asset('img/heimerdinger-emote.webp')}}">
        <p class="text-gray-100">Tired of endless browsing to find that one icon or emote you love?</p>
        <p class="text-gray-100 ">We got you covered! Search through <span
                class="underline decoration-orange-500/50 font-medium">all</span>
            icons &
            emotes with ease. </p>
        <p class="mb-6 text-gray-100">Automatically updated and sorted by release date.</p>
        <p class="text-gray-200 mb-3">Click on the asset category you'd like to view below to get started!</p>
        <div class="flex justify-center space-x-4">
            <a href="{{route('assets.icons.index')}}"
               class="bg-orange-500 text-white font-bold py-2 px-4 rounded hover:bg-orange-600">Icons</a>
            <a href="#" class="bg-orange-500 text-white font-bold py-2 px-4 rounded hover:bg-orange-600">Emotes</a>
        </div>
    </div>
</div>


<x-footer/>

</body>

</html>
