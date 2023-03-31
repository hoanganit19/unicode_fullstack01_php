<?php

namespace App;

use App\Admin\{Home, Product};
//use App\Client\Home;
use DateTime;

class App
{
    /**
     * Class constructor.
     */
    public function __construct()
    {
        // $admin = new AdminHome();
        // $client = new Home();
        // $date = new DateTime();
        // var_dump($date);
        new Home();
        new Product();
    }
}
