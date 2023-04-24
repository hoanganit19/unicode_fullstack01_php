<?php

namespace Core;

use Core\Route;
use Core\Request;
use Core\Session;

class App
{
    private $route = null;


    public function __construct()
    {
        Session::start();
    }

    public function execute()
    {
        require_once '../core/helpers/url.php';
        require_once '../core/helpers/validation.php';

        $this->route = new Route(new Request());
        $this->route->execute();
    }

    public function setConst($dir)
    {
        define('WEB_PATH_ROOT', dirname($dir));

        define('WEB_PATH_APP', WEB_PATH_ROOT.'/app');
    }
}
