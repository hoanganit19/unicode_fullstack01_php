<?php

namespace App\Middlewares;

use Core\Request;
use Core\Session;
use App\Core\Auth;
use Core\Middleware;

class AuthMiddleware extends Middleware
{
    public function handle(Request $request)
    {
        if ($request->is('admin/*') || $request->is('admin')) {
            if (!Auth::check()) {
                redirect(route('auth.login'));
                //abort('403');
            }

        }
        return true;
    }
}
