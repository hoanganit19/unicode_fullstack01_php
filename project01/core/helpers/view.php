<?php

use Core\View;

function view($path, $data)
{
    return View::render($path, $data);
}
