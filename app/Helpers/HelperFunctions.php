<?php

use Intervention\Image\ImageManagerStatic as Image;

function getRoleIcon($roleName)
{
    $roleIcons = [
        'Toplane' => 'gm-top.png',
        'Jungle' => 'gm-jungle.png',
        'Midlane' => 'gm-mid.png',
        'Botlane' => 'gm-bot.png',
        'Support' => 'gm-support.png',
    ];

    return asset('img/' . $roleIcons[$roleName]);
}

function getAverageColorFromImageUrl($imageUrl): string
{
    $img = Image::make($imageUrl);

    $img->resize(24, 24);

    $totalR = 0;
    $totalG = 0;
    $totalB = 0;

    $width = $img->width();
    $height = $img->height();

    for ($x = 0; $x < $width; $x++) {
        for ($y = 0; $y < $height; $y++) {
            $color = $img->pickColor($x, $y);
            $totalR += $color[0];
            $totalG += $color[1];
            $totalB += $color[2];
        }
    }

    $pixelCount = $width * $height;
    $avgR = $totalR / $pixelCount;
    $avgG = $totalG / $pixelCount;
    $avgB = $totalB / $pixelCount;

    return sprintf("#%02x%02x%02x", $avgR, $avgG, $avgB);
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
