<?php

use Core\Session;

function error($field)
{
    $errors = Session::get('validate_errors');
    if (!empty($errors[$field])) {
        $message = !empty($errors[$field]) ? reset($errors[$field]) : null;
        unset($errors[$field]);
        Session::put('validate_errors', $errors);
        return $message;
    }

    return null;
}

function old($field)
{
    $old = Session::get('validate_old');
    if (!empty($old[$field])) {
        $message = !empty($old[$field]) ? $old[$field] : null;
        unset($old[$field]);
        Session::put('validate_old', $old);
        return $message;
    }

    return null;
}
