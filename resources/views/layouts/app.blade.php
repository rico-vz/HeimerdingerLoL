<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- DarkReader somehow thinks the website isn't dark by default,
    this tells darkreader to disable on the site. -->
    <meta name="darkreader-lock">

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

    <meta name="google-adsense-account" content="ca-pub-4505764048662657">

    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">

    @if (strpos(url()->full(), 'page') !== false)
        <link rel="canonical" href="{{ url()->full() }}">
    @else
        <link rel="canonical" href="{{ url()->current() }}">
    @endif

    @stack('meta_tags')


    <!-- OpenGraph -->
    <meta property="og:site_name" content="Heimerdinger.LoL">
    <meta property="og:title" content="@yield('title')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:description" content="@yield('description')">
    <meta property="og:locale" content="en">
    <meta property="og:type" content="website">
    <meta property="og:image" content="@yield('og_image', 'https://cdn.heimerdinger.lol/og-img-home.png')">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="heimerdinger.lol">
    <meta property="twitter:title" content="@yield('title')">
    <meta property="twitter:description" content="@yield('description')">
    <meta property="twitter:image" content="@yield('og_image', 'https://cdn.heimerdinger.lol/og-img-home.png')">

    <link rel="preload" href="/fonts/inter-v13-latin-regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/inter-v13-latin-500.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/inter-v13-latin-600.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/inter-v13-latin-700.woff2" as="font" type="font/woff2" crossorigin>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Google AdSense -->
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client={{ config('ads.client_id') }}"
        crossorigin="anonymous"></script>

    @stack('top_scripts')
    <x-analytics.plausible />
</head>

<body class="antialiased bg-stone-900 dark scroll-smooth">
    <x-navbar />
    @yield('content')
    <x-ads.common />
    <x-footer />
    @stack('bottom_scripts')
</body>

</html>
