<?php

class Person
{
    public function getName()
    {
        return 'Hoàng An';
    }

    public function getEmail()
    {
        return 'hoangan.web@gmail.com';
    }
}

class User extends Person
{
    public function getEmail()
    {
        return 'contact@unicode.vn';
    }
}

$user = new User();
var_dump($user);
