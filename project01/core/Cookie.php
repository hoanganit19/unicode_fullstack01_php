<?php

namespace Core;

class Cookie
{
    public static function put($key, $value, $time=0)
    {
        setcookie($key, $value, time() + $time*60, '/', "", false, true);
    }

    public static function get($key)
    {
        return !empty($_COOKIE[$key]) ? $_COOKIE[$key] : null;
    }

    public static function destroy($key)
    {
        setcookie($key, '', time(), '/', "", false, true);
    }
}
