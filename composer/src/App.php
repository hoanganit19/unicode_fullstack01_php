<?php

namespace App;

use Carbon\Carbon;
use App\controllers\HomeController;

class App
{
    public function __construct()
    {
        echo 'App <br/>';
        //new HomeController();
        //echo HomeController::class.'<br/>';

        // $className = HomeController::class; //trả vè đường dẫn đầy đủ (cả namespace)
        // new $className();
        //getMsg();
        //echo Carbon::now()->format('d/m/Y H:i:s');
        // $time = '2023-05-19 05:30:30';
        // echo Carbon::parse($time)->format('d/m/Y H:i:s');
        echo '<pre>';
        print_r($_ENV);
        echo '</pre>';
        echo getenv('APP_NAME');
    }
}
