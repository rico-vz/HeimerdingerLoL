<?php

return [

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'lmi' => [
        'api_key' => env('LMI_API_KEY'),
    ],

    'boris' => [
        'url' => env('BORIS_URL', 'https://boris.heimerdinger.lol'),
        'api_key' => env('BORIS_API_KEY'),
    ],

];
