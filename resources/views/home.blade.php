<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" sizes="180x180" href="/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/icons/favicon-16x16.png">
    <link rel="manifest" href="/icons/site.webmanifest">
    <link rel="mask-icon" href="/icons/safari-pinned-tab.svg" color="#e6855e">
    <link rel="shortcut icon" href="/icons/favicon.ico">
    <meta name="msapplication-TileColor" content="#ff7c47">
    <meta name="msapplication-config" content="/icons/browserconfig.xml">
    <meta name="theme-color" content="#ff7c47">

    <title>Heimerdinger.LoL</title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link href="https://cdn.jsdelivr.net/gh/RaiseYour/fa@main/css/fontawesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/gh/RaiseYour/fa@main/css/light.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/gh/RaiseYour/fa@main/css/brands.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/gh/RaiseYour/fa@main/css/solid.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/gh/RaiseYour/fa@main/css/regular.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/gh/RaiseYour/fa@main/css/duotone.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body class="antialiased bg-stone-800 dark">
<x-navbar/>
<x-home.features/>
<x-home.upcoming_skins :skins="$skins"/>
<x-home.recent_skins :skins="$skins"/>

</body>

</html>
