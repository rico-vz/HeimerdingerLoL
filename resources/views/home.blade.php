<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/icons/favicon-16x16.png">
    <link rel="manifest" href="/icons/site.webmanifest">
    <link rel="mask-icon" href="/icons/safari-pinned-tab.svg" color="#e6855e">
    <link rel="shortcut icon" href="/icons/favicon.ico">
    <meta name="msapplication-TileColor" content="#ff7c47">
    <meta name="msapplication-config" content="/icons/browserconfig.xml">
    <meta name="theme-color" content="#ff7c47">

    <title>Heimerdinger.LoL • Home</title>
    <meta name="description"
          content="Explore League of Legends champions, skins, and game assets on Heimerdinger.LoL. Your ultimate source for in-depth information on LoL gaming. Dive in now!">

    <!-- OpenGraph -->
    <meta property="og:site_name" content="Heimerdinger.LoL">
    <meta property="og:title" content="Heimerdinger.LoL • Home">
    <meta property="og:description" content="Explore League of Legends champions, skins, and game assets on Heimerdinger.LoL.
          Your ultimate source for in-depth information on LoL gaming. Dive in now!">
    <meta property="og:locale" content="en">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{asset('img/og_image.png')}}">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="heimerdinger.lol">
    <meta property="twitter:title" content="Heimerdinger.LoL • Home">
    <meta property="twitter:description" content="Explore League of Legends champions, skins, and game assets on Heimerdinger.LoL.
          Your ultimate source for in-depth information on LoL gaming. Dive in now!">
    <meta property="twitter:image" content="{{asset('img/og_image.png')}}">

    <link rel="preconnect" href="https://rsms.me/">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body class="antialiased bg-stone-800 dark scroll-smooth">
<x-navbar/>
<x-home.features/>
@if ($upcomingSkins != [])
    <x-home.upcoming_skins :upcomingSkins="$upcomingSkins"/>
@endif
<x-home.recent_skins :latestSkins="$latestSkins"/>
<x-footer/>
</body>
</html>
