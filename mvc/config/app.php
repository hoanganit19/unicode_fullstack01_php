<?php

use App\Providers\AppServiceProvider;

return [
    'app_name' => env('APP_NAME', 'Unicode'),
    'timezone' => env('APP_TIMEZONE', 'Asia/Ho_Chi_Minh'),
    'providers' => [
        AppServiceProvider::class
    ]
];
