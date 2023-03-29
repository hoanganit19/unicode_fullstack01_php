<?php

require_once 'classes/Template.php';
class Person
{
    private $name;
    private $email;
    public $template = null;

    public function __construct($name, $email)
    {
        //echo 'Phương thức khởi tạo';
        /*
        Gán giá trị ban đầu cho các thuộc tính
        Khởi tạo 1 đối tượng mới từ class khác
        */
        $this->name = $name;
        $this->email = $email;
        $this->template = new Template();
    }

    public function getName()
    {
        return $this->name;
    }

    public function getTemplate()
    {
        $this->template->render();
    }

    /**
     * Class destructor.
     */
    public function __destruct()
    {
        echo 'Hàm hủy';
        //Reset dữ liệu, hủy các kết nối
    }
}

$person = new Person('Hoàng An', 'contact@gmail.com');
//echo $person->getName();
$person->template->render();
echo '<br/>';
$person->getTemplate();
echo '<br/>';
