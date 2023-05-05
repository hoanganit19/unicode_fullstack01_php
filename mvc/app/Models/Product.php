<?php

namespace App\Models;

use Core\Model;

class Product extends Model
{
    protected $table = 'groups';
    //protected $primaryKey = 'id';

    public function getListProduct()
    {
        //echo 'a';
        return $this->get(); //SELECT * FROM users;
    }


}

//Quy ước
//1 table => 1 model
//tạo 1 model => cá nhân hóa tương ứng với Table
