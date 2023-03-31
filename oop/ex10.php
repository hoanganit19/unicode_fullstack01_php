<?php

class Person
{
    private static $name = 'Hoàng An';

    public static function __callStatic($method, $args)
    {
        return call_user_func_array([new self(), $method], $args);
    }

    private static function getName()
    {
        return self::$name;
    }

    private static function setName($name)
    {
        self::$name = $name;
    }
}

Person::setName('Hoàng An Unicode');

echo Person::getName().'<br/>';
