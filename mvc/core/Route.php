<?php

namespace Core;

use Closure;

class Route
{
    private static $routes = [];

    public function __construct()
    {
        require_once '../routes/web.php';
    }

    public static function get($path, $callback)
    {
        /*
        Cấu trúc mảng
        $routes[$method][$path] = $callback
        */
        $path = self::handlePath($path);
        self::$routes['get'][$path] = $callback;

    }

    public static function post($path, $callback)
    {
        $path = self::handlePath($path);
        self::$routes['post'][$path] = $callback;
    }

    public static function handlePath($path)
    {
        $path = preg_replace('/\{.+?\}+/', '(.+)', $path);
        return $path;
    }

    public function execute()
    {
        $path = $this->getPath();
        $method = $this->getMethod();

        $callback = null;
        $params = [];
        if (!empty(self::$routes[$method])) {
            foreach (self::$routes[$method] as $key => $value) {
                if (preg_match('~^'.$key.'$~i', $path, $matches)) {
                    $callback = self::$routes[$method][$key];
                    if (!empty($matches[1])) {
                        $params = $matches;
                    }
                    break;
                }
            }
        }

        unset($params[0]);
        $params = array_values($params);

        if (!empty($callback)) {

            if ($callback instanceof Closure) {
                echo call_user_func_array($callback, $params);
            } elseif(is_array($callback)) {
                $controllerName = $callback[0];
                $actionName = $callback[1];

                $controllerObj = new $controllerName();

                echo call_user_func_array([$controllerObj, $actionName], $params);
            }
        } else {
            require_once '../core/errors/404.php';
        }

    }

    public function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function getPath()
    {
        $publicFolder = dirname($_SERVER['SCRIPT_NAME']);
        $publicFolder = str_replace('\\', '/', $publicFolder);

        $requestUri = parse_url($_SERVER['REQUEST_URI']);
        $requestUri = $requestUri['path'];

        if ($publicFolder!=='/') {
            $pathArr = explode($publicFolder, $requestUri);
            $path = end($pathArr);
        } else {
            $path = $requestUri;
        }

        return $path;
    }
}
