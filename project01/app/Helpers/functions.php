<?php

use Core\View;

function message($content, $type = 'success')
{
    return View::render('messages/admin_message', compact('content', 'type'));
}