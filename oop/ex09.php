<?php

class Car
{
    public static function getModel()
    {
        return 'This is model car';
    }

    public static function model()
    {
        return static::getModel();
    }
}

class Honda extends Car
{
    public static function getModel()
    {
        return 'This is model honda';
    }
}

echo Car::model();
