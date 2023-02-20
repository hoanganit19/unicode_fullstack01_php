<?php

function redirect($url)
{
    header('Location: '.$url);
    exit;
}

function reload()
{
    header("Refresh:0");
    exit;
}

function setSession($key, $value)
{
    $_SESSION[$key] = $value;
}

function getSession($key)
{
    return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
}

function removeSession($key=null)
{
    if (!empty($key)) {
        //Xóa session theo key
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    } else {
        session_destroy();
    }
}

function getFlashData($key)
{
    $data = getSession($key);
    removeSession($key);
    return $data;
}