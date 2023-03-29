<?php

class Person
{
    public static $name = 'Hoàng An';
    public $email = 'contact@unicode.vn';
    public static $person = null;

    public function __construct()
    {
        self::$person = $this;
    }
    public static function getName()
    {
        //không được dùng $this
        return self::$name;
    }

    public function getName2()
    {
        //Được dùng $this
        //Được dùng self, static
        return self::$name;
    }

    public static function getEmail()
    {
        //return (new self())->email;
        return self::$person->email;
    }
}
$person = new Person();
// echo Person::$name.'<br/>';
// echo Person::getName().'<br/>';
//echo $person->getName2();
//echo Person::getEmail();

/*
Thuộc tính tĩnh => Không làm thay đổi dữ liệu khi khởi tạo lại đối tượng
Thuộc tính thường => Gán lại dữ liệu khi khởi tạo đối tượng
*/

class User
{
    public $name = 'Hoàng An';
    public static $name2 = 'Hoàng An';

    public function setName($name)
    {
        $this->name = $name;
    }

    public static function setName2($name)
    {
        self::$name2 = $name;
    }
}

$user = new User();
$user->setName('Hoàng An Unicode');
User::setName2('Hoàng An Unicode');
echo $user->name.'<br/>';
echo User::$name2.'<br/>';

$user = new User();
echo $user->name.'<br/>';
echo User::$name2.'<br/>';
