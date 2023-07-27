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
        require_once '../core/helpers/request.php';
        require_once '../core/helpers/url.php';
        require_once '../core/helpers/validation.php';
        require_once '../core/helpers/config.php';
        require_once '../core/helpers/errors.php';
        require_once '../core/helpers/view.php';

        $dotenv = Dotenv::createImmutable(WEB_PATH_ROOT);
        $dotenv->safeLoad();

        //Load Alias
        $alias = config('app.alias');
        if (!empty($alias)) {
            foreach ($alias as $key => $value) {
                class_alias($value, $key);
            }
        }

        //Load Provideer
        $providers = config('app.providers');
        if (!empty($providers)) {
            foreach ($providers as $provider) {
                //Tạo object
                call_user_func_array([new $provider(), 'boot'], []);
            }
        }

        $request = new Request();

        $this->route = new Route($request);

        //Load Middleware
        $middlewares = config('app.middlewares');
        if (!empty($middlewares)) {
            foreach ($middlewares as $middleware) {
                $status = (new $middleware())->handle($request);
                if (!$status) {
                    die('Request không được phép');
                }
            }
        }


        $this->route->execute();
    }

    public function setConst($dir)
    {
        define('WEB_PATH_ROOT', dirname($dir));

        define('WEB_PATH_APP', WEB_PATH_ROOT.'/app');
    }
}
