@extends('layouts.app')

@section('title', $skin->skin_name . ' • Heimerdinger.LoL')
@section('description',
    'Heimerdinger.LoL: ' .
    $skin->skin_name .
    ' details showing all the information about
    the ' .
    $skin->rarity .
    ' ' .
    $skin->champion->name .
    ' skin. ' .
    substr($skin->lore, 0, 50) .
    '...')

@section('content')
    <x-skins.grid_info :skin="$skin" />
@endsection

@push('bottom_scripts')
    @vite('resources/js/horizontal-scroll.js')
    <script type="application/ld+json">
    @php
    $description = $skin->skin_name . " is a " . $skin->rarity . " tier skin for " . $skin->champion->name . " in League of Legends";

    if($skin->new_effects) $description .= " with custom visual effects";
    if($skin->new_animations) $description .= ", new animations";
    if($skin->new_recall) $description .= ", custom recall animation";
    if($skin->new_voice) $description .= ", new voice over";
    if($skin->new_quotes) $description .= ", unique voice lines";
    $description .= ".";

    $properties = [
        ["@type" => "PropertyValue", "name" => "Rarity", "value" => $skin->rarity],
    ];

    if ($skin->rp_price != '99999') {
        $properties[] = ["@type" => "PropertyValue", "name" => "Price", "value" => (int) $skin->rp_price, "unitText" => "RP"];
    }

    $artwork = [
        "@type" => "VisualArtwork",
        "name" => $skin->skin_name,
        "image" => $skin->getSkinImageAttribute(true),
        "artform" => "League of Legends champion skin",
        "creator" => ["@type" => "Organization", "name" => "Riot Games"],
        "about" => [
            "@type" => "Thing",
            "name" => $skin->champion->name,
            "url" => route('champions.show', $skin->champion),
        ],
    ];

    if ($skin->release_date && $skin->release_date != '0000-00-00') {
        $artwork["datePublished"] = $skin->release_date;
    }

    // creating json object cause blade parsing
    $jsonObject = [
        "@context" => "https://schema.org/",
        "@type" => "WebPage",
        "name" => $skin->skin_name . " - League of Legends Skin",
        "description" => $description,
        "url" => url()->current(),
        "mainEntity" => $artwork,
        "additionalProperty" => $properties,
    ];

    echo json_encode($jsonObject, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    @endphp
    </script>
@endpush
