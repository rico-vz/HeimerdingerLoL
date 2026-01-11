<?php

return [

    'default' => env('DB_CONNECTION', 'mysql'),

    'migrations' => [
        'table' => 'migrations',
        'update_date_on_publish' => false, // disable to preserve original behavior for existing applications
    ],

    'connections' => [
        'mysql' => [
            'driver' => 'mysql',
            'url' => env('DB_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'laravel'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => env('DB_CHARSET', 'utf8mb4'),
            'collation' => env('DB_COLLATION', 'utf8mb4_unicode_ci'),
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? [
                PDO::ATTR_TIMEOUT => 15,
                PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,
            ] : [],
            'sticky' => true,
        ],
    ],

];
