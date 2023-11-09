<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Cloudflare Information
    |--------------------------------------------------------------------------
    |
    | These values are used to purge the Cloudflare cache when the application
    | is updated. The zone ID can be found in the Cloudflare dashboard under
    | the "Overview" tab. The bearer token can be generated in the "API" tab.
    |
    */

    'cf_zone_id' => env('CLOUDFLARE_ZONE_ID', '00000'),
    'cf_auth_bearer' => env('CLOUDFLARE_AUTH_BEARER', '00000'),
];
