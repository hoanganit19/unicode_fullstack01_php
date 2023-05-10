<?php

use Core\Route;

function route($name, $params = [])
{
    return Route::getUrl($name, $params);
}

function redirect($path)
{
    // $redirect = new Redirect();
    // return $redirect;
    header("Location: $path");
    exit;
}

//redirect('/san-pham')
//redirect()->route('products');
//redirect(route('products'));
