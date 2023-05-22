<?php

namespace App\Models;

use Core\Model;

class Page extends Model
{
    protected $table = 'pages';

    public function getPages()
    {
        return $this->paginate("SELECT * FROM $this->table ORDER BY created_at DESC", config('paginate.admin'));
    }

    public function getPage($field = 'id', $value)
    {
        return $this->first(null, "$field=?", [$value]);
    }

    public function updatePage($data, $id)
    {
        return $this->update(null, $data, $id);
    }
}