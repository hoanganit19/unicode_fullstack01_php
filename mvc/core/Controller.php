<?php

namespace Core;

use Core\View;

class Controller
{
    public function view($path, $data = [])
    {
        View::render($path, $data);
    }


}