<?php

namespace App\Models;

use Core\Model;

class Product extends Model
{
    private $table = 'products';

    public function getListProduct()
    {
        return $this->get("SELECT * FROM $this->table");
    }
}

//Quy ước
//1 table => 1 model
