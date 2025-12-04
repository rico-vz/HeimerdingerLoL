<?php

return [
    /*
     |--------------------------------------------------------------------------
     | Sales page feature toggle
     |--------------------------------------------------------------------------
     |
     | Enable or disable fetching of the external Sale Rotation data. When set to
     | true, the app will attempt to fetch sale rotation data from the external
     | API. When false, the sales page will show a maintenance message and no
     | external requests are made.
     |
     */

    'enabled' => env('SALES_ENABLED', false),
];
