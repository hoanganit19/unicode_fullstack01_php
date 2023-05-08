<?php

namespace App\Providers;

use Core\View;
use Core\Session;

class AppServiceProvider
{
    public function boot()
    {
        //Chạy share data
        $user = Session::get('userLogin');
        View::share(
            compact('user')
        );

        View::share(
            ['info' => 'a']
        );
    }
}
