<?php

use Illuminate\Support\Facades\Facade;

return [

    'login_route' => env('LOGIN_ROUTE_NAME', 'login'),

    'aliases' => Facade::defaultAliases()->merge([
        'HCaptcha' => Scyllaly\HCaptcha\Facades\HCaptcha::class,
        // 'Example' => App\Facades\Example::class,
    ])->toArray(),

    'IS_STAGING' => env('APP_STAGING') == 'true',

    'HEIMER_URL' => env('APP_ENV') == 'local' ? 'http://127.0.0.1:8000'
        : (env('IS_STAGING')
            ? 'https://staging.heimerdinger.lol'
            : 'https://heimerdinger.lol'),

    'GTAG_MEASUREMENT_ID' => env('GTAG_MEASUREMENT_ID', 'G-XXXXXXXXXX'),

    'MAMC_SECRET' => env('MAMC_SECRET', 'secret'),

];
