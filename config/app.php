<?php

use Illuminate\Support\Facades\Facade;
use Illuminate\Support\ServiceProvider;

return [

    'login_route' => env('LOGIN_ROUTE_NAME', 'login'),

    'providers' => ServiceProvider::defaultProviders()->merge([
        /*
         * Package Service Providers...
         */

        /*
         * Application Service Providers...
         */
        App\Providers\AppServiceProvider::class,
        App\Providers\AuthServiceProvider::class,
        // App\Providers\BroadcastServiceProvider::class,
        App\Providers\EventServiceProvider::class,
        App\Providers\RouteServiceProvider::class,
        Scyllaly\HCaptcha\HCaptchaServiceProvider::class,
    ])->toArray(),

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

];
