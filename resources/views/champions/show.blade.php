@extends('layouts.app')

@section('title', $champion->name . ' • Heimerdinger.LoL')
@section('description',
    'Heimerdinger.LoL: ' .
    $champion->name .
    ' details showing all the information you need to know
    about ' .
    $champion->name .
    ', ' .
    $champion->title .
    '. ' .
    substr($champion->lore, 0, 50) .
    '...')

@section('content')
    <x-champions.grid_info :champion="$champion" :streamers="$streamers" />
@endsection

@push('bottom_scripts')
    @vite('resources/js/horizontal-scroll.js')
    <script type="application/ld+json">
    @php
    $description = $champion->name . " is a " . strtolower(implode('/', $champion->roles)) . " champion in League of Legends";

    $jsonObject = [
        "@context" => "https://schema.org/",
        "@type" => "SoftwareApplication",
        "applicationCategory" => "Game",
        "name" => "League of Legends",
        "operatingSystem" => "Windows, macOS",
        "publisher" => [
            "@type" => "Organization",
            "name" => "Riot Games"
        ],
        "offers" => [
            "@type" => "Offer",
            "price" => "0",
            "priceCurrency" => "USD"
        ],
        "character" => [
            "@type" => "Character",
            "name" => $champion->name,
            "description" => $description,
            "image" => $champion->getChampionImageAttribute(true)
        ],
        "url" => url()->current()
    ];

    $jsonObject["character"]["characterAttribute"] = $champion->roles;
    $jsonObject["character"]["additionalProperty"] = [
        [
            "@type" => "PropertyValue",
            "name" => "Attack Type",
            "value" => $champion->attack_type
        ],
        [
            "@type" => "PropertyValue",
            "name" => "Damage Type",
            "value" => $champion->adaptive_type
        ],
        [
            "@type" => "PropertyValue",
            "name" => "Resource",
            "value" => $champion->resource_type
        ],
        [
            "@type" => "PropertyValue",
            "name" => "Release Date",
            "value" => $champion->release_date
        ]
    ];

    echo json_encode($jsonObject, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    @endphp
    </script>
@endpush
