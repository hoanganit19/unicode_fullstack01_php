<?php

namespace Core;

use Closure;
use Exception;
use ReflectionMethod;

class Route
{
    private static $routes = [];
    private static $context = null;
    private static $pathList = [];
    private static $pathWithName = [];
    private $request = null;

    public function __construct($request)
    {
        self::$context = $this;
        $this->request = $request;
        $this->request->setData();

        require_once '../routes/web.php';

    }

    public static function get($path, $callback)
    {
        /*
        Cấu trúc mảng
        $routes[$method][$path] = $callback
        */
        self::$pathList[] = trim($path, '/');
        $path = self::handlePath($path);
        self::$routes['get'][$path] = $callback;


        return self::$context;
    }

    public static function post($path, $callback)
    {
        self::$pathList[] = trim($path, '/');
        $path = self::handlePath($path);
        self::$routes['post'][$path] = $callback;

        return self::$context;
    }

    public static function handlePath($path)
    {
        $path = preg_replace('/\{.+?\}+/', '(.+)', $path);
        return trim($path, '/');
    }

    public function name($name)
    {
        //echo $name.'<br/>';
        //home => /
        //products => /san-pham

        self::$pathWithName[$name] = end(self::$pathList);
    }

    public function execute()
    {

        $path = $this->request->getPath();
        $method = $this->request->getMethod();

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

        //Thêm request vào params
        //$params = array_merge([$this->request], $params);

        if (!empty($callback)) {

            if ($callback instanceof Closure) {
                echo call_user_func_array($callback, $params);
            } elseif(is_array($callback)) {
                $controllerName = $callback[0];
                $actionName = $callback[1];

                $controllerObj = new $controllerName();

                $r = new ReflectionMethod($controllerName, $actionName);
                $paramsReflection = $r->getParameters();

                $paramHandle = [];
                $index = -1;
                foreach ($paramsReflection as $param) {
                    //$param is an instance of ReflectionParameter
                    $type = (string)$param->getType();

                    //echo $type.'<br/>';

                    if ($type === 'Core\Request') {
                        $paramHandle[] = $this->request;
                    } else {
                        $index++;
                        $paramHandle[] = $params[$index];
                    }
                }

                echo call_user_func_array([$controllerObj, $actionName], $paramHandle);
            }
        } else {
            require_once '../core/errors/404.php';
        }

    }

    public static function getUrl($name, $params = [])
    {

        try {
            if (isset(self::$pathWithName[$name])) {
                $host = $_SERVER['HTTP_HOST'];
                $protocol = !empty($_SERVER['HTTPS']) ? 'https://' : 'http://';
                $url = $protocol.$host.'/'.self::$pathWithName[$name];
                if (!empty($params)) {
                    foreach ($params as $key => $value) {
                        $url = str_replace('{'.$key.'}', $value, $url);
                    }
                }
                return $url;
            } else {
                throw new Exception("Route $name not found");
            }
        } catch(Exception $exception) {
            echo $exception->getMessage();
            exit;
        }

    }


}
