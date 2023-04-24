<?php

namespace Core;

class Session
{
    public static function start()
    {
        session_start();
    }

    public static function put($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function get($key)
    {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }

    public static function destroy($key)
    {
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
            return true;
        }

        return false;
    }

    public static function clear()
    {
        session_destroy();
        return true;
    }

    public function getFlash($key)
    {
        $data = self::get($key);

        self::destroy($key);

        return $data;
    }
}
