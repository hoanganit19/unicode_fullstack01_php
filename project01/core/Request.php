<?php

namespace Core;

use Core\Validator;

class Request
{
    private $path = null;
    private $body = [];

    public function __construct()
    {
        $this->resetData();
    }

    public function __get($name)
    {
        if (!empty($this->{$name})) {
            return  $this->{$name};
        }
        return null;
    }


    public function setData()
    {
        $method = $this->getMethod();
        if ($method == 'get') {
            $this->body = $_GET;
        } elseif ($method == 'post') {
            $this->body = $_POST;
        }

        if (!empty($this->body)) {
            foreach ($this->body as $key => $value) {
                $this->{$key} = $value;
            }
        }
    }

    public function resetData()
    {
        $this->body = [];

        $this->path = null;
    }


    public function all()
    {
        return $this->body;
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

        $this->path =  trim($path, '/');

        return $this->path;
    }

    public function getPrevPath()
    {
        if (!empty($_SERVER['HTTP_REFERER'])) {
            $refer = $_SERVER['HTTP_REFERER'];
            $host = $_SERVER['HTTP_HOST'];
            $protocol = !empty($_SERVER['HTTPS']) ? 'https://' : 'http://';
            $prevPath = str_replace($protocol.$host, '', $refer);
            return $prevPath;
        }

        return '/';

    }

    public function validate($rules, $messages, $attributes = [])
    {
        $validator = Validator::make($this->body, $rules, $messages, $attributes);
        if ($validator->fails()) {
            redirect($this->getPrevPath());
        }
    }

    public function is($path)
    {
        $currentPath = $this->getPath();

        if (strpos($path, '*') !== false) {
            $path = str_replace('*', '.+?', $path); //pattern regex

            if (preg_match('~'.$path.'~i', $currentPath)) {
                return true;
            }
        } else {
            if ($currentPath == $path) {
                return true;
            }
        }

        return false;
    }

    public function getParams()
    {
        return $_SERVER['QUERY_STRING'] ? $_SERVER['QUERY_STRING'] : null;
    }

    //$request->is('admin') ==> Check getPath == 'admin'

    //$request->is('admin/*') => Check getPath có tiền tố là admin
}
