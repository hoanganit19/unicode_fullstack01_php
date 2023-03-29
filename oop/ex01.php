<?php

//Định nghĩa class
class Person
{
    public $name = 'Hoàng An';
    public $email = 'contact@unicode.vn';

    public const MSG = 'Học PHP tại Unicode';

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
}

//Tạo đối tượng
$person = new Person();
echo $person->name.'<br/>';
echo $person->email.'<br/>';

$person->name = 'Hoàng An Unicode';

echo $person->getName().'<br/>';
echo $person::MSG.'<br/>';
echo Person::MSG.'<br/>';

echo '<hr/>';
$person2 = new Person();
$person2->name = 'Hoàng An 2';
echo $person2->getName().'<br/>';

$person2->setName('Khóa học PHP');
echo $person2->getName().'<br/>';

//Getter vs Setter
//magic method: __get(), __set()
