<?php

class Person
{
    private $name = 'Hoàng An';
    private $email = 'contact@unicode.vn';

    public function __call($method, $args)
    {
        return call_user_func_array([$this, $method], $args);
    }

    private function getName()
    {
        return $this->name;
    }

    private function getEmail()
    {
        return $this->email;
    }

    private function setData($name, $email)
    {
        $this->name = $name;
        $this->email = $email;
    }

    // private function setName($name)
    // {
    //     $this->name = $name;
    // }
}

$person = new Person();
//$person->setName('Hoàng An Unicode');
$person->setData('Hoàng An Unicode', 'hoangan.web@gmail.com');
echo $person->getName().'<br/>';
echo $person->getEmail().'<br/>';
