<?php

namespace App\Middlewares;

use Core\Request;
use Core\Session;
use App\Core\Auth;
use Core\Middleware;

class GuestMiddleware extends Middleware
{
    public function handle(Request $request)
    {
        if ($request->is("auth/*")) {
            if (Auth::check()) {
                redirect(route('admin.dashboard.index'));
            }
        }

        return true;
    }
}
