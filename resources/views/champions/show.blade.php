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

    <title>{{$champion->name}} • Heimerdinger.LoL</title>
    <meta name="description"
          content="Heimerdinger.LoL: {{$champion->name}} details showing all the information you need to know about {{$champion->name}}, {{$champion->title}}. {{substr($champion->lore, 0, 50)}}...">

    <!-- OpenGraph -->
    <meta property="og:site_name" content="Heimerdinger.LoL">
    <meta property="og:title" content="{{$champion->name}} • Heimerdinger.LoL">
    <meta property="og:description" content="Heimerdinger.LoL: {{$champion->name}} details showing all the information you need to know about {{$champion->name}}, {{$champion->title}}. {{substr($champion->lore, 0, 50)}}...">
    <meta property="og:locale" content="en">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{asset('img/og_image.png')}}">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="heimerdinger.lol">
    <meta property="twitter:title" content="{{$champion->name}} • Heimerdinger.LoL">
    <meta property="twitter:description" content="Heimerdinger.LoL: {{$champion->name}} details showing all the information you need to know about {{$champion->name}}, {{$champion->title}}. {{substr($champion->lore, 0, 50)}}...">
    <meta property="twitter:image" content="{{asset('img/og_image.png')}}">

    <link rel="preconnect" href="https://rsms.me/">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body class="antialiased bg-stone-900 dark">
<x-navbar/>
<x-champions.grid_info :champion="$champion"/>



</body>

</html>
