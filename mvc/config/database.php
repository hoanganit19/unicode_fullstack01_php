<?php

return [
    'connection_default' => env('DB_CONNECTION', 'mysql'),

    'mysql' => [
        'db_driver' => 'mysql',
        'db_host' => env('DB_HOST', 'localhost'),
        'db_user' => env('DB_USER', 'root'),
        'db_password' => env('DB_PASSWORD', ''),
        'db_name' => env('DB_NAME', 'database'),
        'db_port' => env('DB_PORT', 3306)
    ]
];
