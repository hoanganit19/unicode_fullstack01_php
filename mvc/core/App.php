<?php

namespace Core;

use Core\Route;

class App
{
    private $route = null;

    public function execute()
    {
        $this->route = new Route();
        $this->route->execute();
    }

    public function setConst($dir)
    {
        define('WEB_PATH_ROOT', dirname($dir));

        define('WEB_PATH_APP', WEB_PATH_ROOT.'/app');
    }
}
