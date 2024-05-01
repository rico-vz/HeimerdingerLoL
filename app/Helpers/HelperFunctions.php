<?php

use App\Models\ChampionImage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

function getRoleIcon($roleName): string
{
    $roleIcons = [
        'Toplane' => 'gm-top.png',
        'Jungle' => 'gm-jungle.png',
        'Midlane' => 'gm-mid.png',
        'Botlane' => 'gm-bot.png',
        'Support' => 'gm-support.png',
    ];

    return asset('img/'.$roleIcons[$roleName]);
}

function getAverageColorFromImageUrl($imageUrl): string
{
    $imgManager = new ImageManager(new Driver());

    try {
        $img = $imgManager->read(file_get_contents($imageUrl));
    } catch (Exception $e) {
        return '#904f2c';
    }

    $img->resize(32, 32);

    $totalR = 0;
    $totalG = 0;
    $totalB = 0;

    $width = $img->width();
    $height = $img->height();

    for ($x = 0; $x < $width; $x++) {
        for ($y = 0; $y < $height; $y++) {
            $color = $img->pickColor($x, $y);
            $totalR += $color->red()->toInt();
            $totalG += $color->green()->toInt();
            $totalB += $color->blue()->toInt();
        }
    }

    $pixelCount = $width * $height;
    $avgR = $totalR / $pixelCount;
    $avgG = $totalG / $pixelCount;
    $avgB = $totalB / $pixelCount;

    return sprintf('#%02x%02x%02x', $avgR, $avgG, $avgB);
}

function getRoleIconSvg($roleName): string
{
    $roleIcons = [
        'Toplane' => 'icon-position-top',
        'Jungle' => 'icon-position-jungle',
        'Midlane' => 'icon-position-middle',
        'Botlane' => 'icon-position-bottom',
        'Support' => 'icon-position-utility',
    ];

    return $roleIcons[$roleName];
}

/**
 * Get the champion image.
 *
 * @param  string  $full_id
 * @param  enum  $type  splash, uncentered_splash, loading, tile, icon, ability, video
 * @return string
 */
function getChampionImage($full_id, $type): string
{
    $championImage = ChampionImage::where('full_id', $full_id)->where('type', $type)->first();

    if (! $championImage) {
        return '';
    }

    return $championImage->url;
}
