<?php

use Core\Session;
use App\Core\Auth;
use Carbon\Carbon;
use Core\Databases\DB;
use App\Middlewares\AuthMiddleware;
use App\Middlewares\GuestMiddleware;
use App\Providers\AppServiceProvider;

return [
    'app_name' => env('APP_NAME', 'Unicode'),
    'timezone' => env('APP_TIMEZONE', 'Asia/Ho_Chi_Minh'),
    'providers' => [
        AppServiceProvider::class
    ],
    'middlewares' => [
        AuthMiddleware::class,
        GuestMiddleware::class
    ],
    'alias' => [
        'Auth' => Auth::class,
        'DB' => DB::class,
        'Session' => Session::class,
        'Carbon' => Carbon::class
    ]
];