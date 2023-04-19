<?php

namespace Core;

use Core\Route;
use Core\Request;

class App
{
    private $route = null;

    public function execute()
    {
        require_once '../core/helpers/url.php';

        $this->route = new Route(new Request());
        $this->route->execute();
    }

    public function setConst($dir)
    {
        define('WEB_PATH_ROOT', dirname($dir));

        define('WEB_PATH_APP', WEB_PATH_ROOT.'/app');
    }
}
