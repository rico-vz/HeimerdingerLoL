<?php

return [

    'migrations' => [
        'table' => 'migrations',
        'update_date_on_publish' => false, // disable to preserve original behavior for existing applications
    ],

    'connections' => [
        'mysql' => [
            'options' => extension_loaded('pdo_mysql') ? [
                PDO::ATTR_TIMEOUT => 15,
                PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,
            ] : [],
            'sticky' => true,
        ],
    ],

];
