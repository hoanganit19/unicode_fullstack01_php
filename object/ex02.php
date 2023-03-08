<?php

class User
{
    public $name = 'Hoàng An';
    public $age = 30;
    public static $address = 'Hà Nội';

    public const VERSION = '1.0';

    public function getName()
    {
        return $this->name;
    }

    public static function getMessage()
    {
        return 'Unicode Academy';
    }
}

$user = new User();
echo '<pre>';
print_r($user);
echo '</pre>';
echo $user->getName().'<br/>';
echo $user->name.'<br/>';
echo $user->age.'<br/>';
echo User::VERSION.'<br/>';
echo $user::VERSION.'<br/>';
echo User::getMessage().'<br/>'; //phương thức tĩnh
echo User::$address.'<br/>'; //thuộc tính tĩnh
