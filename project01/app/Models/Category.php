<?php

namespace App\Models;

use Core\Model;

class Category extends Model
{
    protected $table = 'categories';

    public function getCategories()
    {
        return $this->paginate("SELECT * FROM $this->table ORDER BY created_at DESC", config('paginate.admin'));
    }

    public function getAllCategories()
    {
        return $this->get("SELECT * FROM $this->table ORDER BY name DESC");
    }

    public function getCategory($field = 'id', $value)
    {
        return $this->first(null, "$field=?", [$value]);
    }

    public function updateCategory($data, $id)
    {
        return $this->update(null, $data, $id);
    }
}
