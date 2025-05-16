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
    @vite('resources/js/vert-scroll.js')
    <script type="application/ld+json">
    @php
    $description = $skin->skin_name . " is a " . $skin->rarity . " tier skin for " . $skin->champion->name . " in League of Legends";
    $realCurrencyPrice = match (true) {
        $skin->rp_price == '99999' => 0,
        $skin->rp_price >= 3250 => 25,
        $skin->rp_price >= 1820 => 15,
        $skin->rp_price >= 1350 => 10,
        $skin->rp_price >= 975 => 7.5,
        $skin->rp_price >= 520 => 5,
        default => 0,
    };

    if($skin->new_effects) $description .= " with custom visual effects";
    if($skin->new_animations) $description .= ", new animations";
    if($skin->new_recall) $description .= ", custom recall animation";
    if($skin->new_voice) $description .= ", new voice over";
    if($skin->new_quotes) $description .= ", unique voice lines";
    $description .= ".";

    // creating json object cause blade parsing
    $jsonObject = [
        "@context" => "https://schema.org/",
        "@type" => "Product",
        "name" => $skin->skin_name . " - League of Legends Skin",
        "image" => $skin->getSkinImageAttribute(true),
        "description" => $description,
        "brand" => [
            "@type" => "Brand",
            "name" => "Riot Games"
        ],
        "sku" => "lol-skin-" . $skin->id,
        "offers" => [
            "@type" => "Offer",
            "url" => url()->current(),
            "priceCurrency" => "EUR",
            "price" => $skin->rp_price == '99999' ? '' : $realCurrencyPrice,
            "priceValidUntil" => date('Y-m-d', strtotime('+1 year')),
            "availability" => $skin->availability == 'Available'
                ? 'https://schema.org/InStock'
                : ($skin->availability == 'Upcoming' || $skin->release_date == '0000-00-00'
                    ? 'https://schema.org/PreOrder'
                    : 'https://schema.org/LimitedAvailability'),
            "seller" => [
                "@type" => "Organization",
                "name" => "Riot Games"
            ]
        ],
        "category" => "Video Game Cosmetic Item",
        "releaseDate" => $skin->release_date == '0000-00-00' ? '' : $skin->release_date
    ];

    echo json_encode($jsonObject, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    @endphp
    </script>
@endpush
