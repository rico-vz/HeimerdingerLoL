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

    <title>{{$icon->title}} • Heimerdinger.LoL</title>
    <meta name="description"
          content="Heimerdinger.LoL: {{$icon->title}} details showing all the information about the icon released in {{$icon->release_year}}. {{substr($icon->description, 0, 64)}}...">

    <!-- OpenGraph -->
    <meta property="og:site_name" content="Heimerdinger.LoL">
    <meta property="og:title" content="{{$icon->title}} • Heimerdinger.LoL">
    <meta property="og:description"
          content="Heimerdinger.LoL: {{$icon->title}} details showing all the information about the icon released in {{$icon->release_year}}. {{substr($icon->description, 0, 64)}}...">
    <meta property="og:locale" content="en">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{asset('img/og_image.png')}}">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="heimerdinger.lol">
    <meta property="twitter:title" content="{{$icon->title}} • Heimerdinger.LoL">
    <meta property="twitter:description"
          content="Heimerdinger.LoL: {{$icon->title}} details showing all the information about the icon released in {{$icon->release_year}}. {{substr($icon->description, 0, 64)}}...">
    <meta property="twitter:image" content="{{asset('img/og_image.png')}}">

    <link rel="preconnect" href="https://rsms.me/">
    <link rel="preload" href="https://rsms.me/inter/inter.css" as="style">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" media="print" onload="this.media='all'">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased bg-stone-900 dark scroll-smooth min-h-screen">
<x-navbar/>
<x-icons.view_grid :icon="$icon"/>
<x-footer/>
</body>

</html>