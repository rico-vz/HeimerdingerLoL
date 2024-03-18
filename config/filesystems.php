<?php

return [

    'disks' => [
        'r2' => [
            'driver' => 's3',
            'key' => env('CLOUDFLARE_R2_ACCESS_KEY_ID'),
            'secret' => env('CLOUDFLARE_R2_SECRET_ACCESS_KEY'),
            'region' => 'auto', // != Cloudflare R2 doesn't have specific regions, so 'us-east-1' is fine.
            'bucket' => env('CLOUDFLARE_R2_BUCKET'),
            'url' => env('CLOUDFLARE_R2_URL'),
            'visibility' => 'private',
            'endpoint' => env('CLOUDFLARE_R2_ENDPOINT'),
            'use_path_style_endpoint' => env('CLOUDFLARE_R2_USE_PATH_STYLE_ENDPOINT', false),
            'throw' => false,
        ],

        'posts' => [
            'driver' => 'local',
            'root' => base_path('content/posts'),
        ],
    ],

];
