<?php

namespace Core;

use Core\Route;
use Core\Request;
use Core\Session;
use Dotenv\Dotenv;

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
        require_once '../core/helpers/config.php';

        $dotenv = Dotenv::createImmutable(WEB_PATH_ROOT);
        $dotenv->safeLoad();

        //Load Provideer
        $providers = config('app.providers');
        if (!empty($providers)) {
            foreach ($providers as $provider) {
                //Tạo object
                call_user_func_array([new $provider(), 'boot'], []);
            }
        }

        $this->route = new Route(new Request());
        $this->route->execute();
    }

    public function setConst($dir)
    {
        define('WEB_PATH_ROOT', dirname($dir));

        define('WEB_PATH_APP', WEB_PATH_ROOT.'/app');
    }
}
