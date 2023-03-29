<?php

class Person
{
    private $name = 'Hoàng An';
    private $email = 'contact@unicode.vn';

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    private function callApi()
    {
        echo 'Call api <br/>';
    }

    public function get()
    {
        $this->callApi();
    }

    //Magic method
    public function __get($propertyName)
    {
        //Chạy khi cố tình truy cập vào 1 thuộc tính không được phép
        //echo $name;
        return $this->{$propertyName};
    }

    public function __set($propertyName, $propertyValue)
    {
        $this->{$propertyName} = $propertyValue;
    }
}

$person = new Person();
// echo $person->getName().'<br/>';
//echo $person->name;

/*
- Các thuộc tính không nên để public (private hoặc protected)
- Các phương thức nên để public (Trừ 1 số phương thức không cần gọi từ bên ngoài)
- Muốn truy cập vào các thuộc tính private, protected => sử dụng thông qua phương thức (setter, getter)
*/

// $person->get();
$person->name = 'Unicode Academy';
echo $person->name;
