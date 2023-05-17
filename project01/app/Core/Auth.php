<?php

namespace App\Core;

use Core\Cookie;
use Core\Session;
use App\Models\User;

class Auth
{
    public static function user()
    {
        if (self::check()) {
            return (object)Session::get('userLogin');
        }
        return false;
    }

    public static function check()
    {
        if (Session::get('userLogin')) {
            return true;
        } else {

            $token = Cookie::get('rememberToken');
            // echo $token;
            // die();
            if ($token) {

                $userModel = new User();
                $user = $userModel->getUser('remember_token', $token);
                if (!empty($user)) {
                    self::setLogin($user);
                    return true;
                }
            }
        }

        return false;
    }

    public static function logout()
    {
        $status = Session::destroy('userLogin');
        Cookie::destroy('rememberToken');
        return true;
    }

    public static function setLogin($data)
    {
        Session::put('userLogin', $data);
    }
}
