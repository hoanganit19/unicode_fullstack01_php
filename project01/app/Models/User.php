<?php

namespace App\Models;

use Core\Model;

class User extends Model
{
    protected $table = 'users';

    public function getUser($field = 'id', $value)
    {
        return $this->first(null, "$field=?", [$value]);
    }

    public function updateUser($data, $id)
    {
        return $this->update(null, $data, $id);
    }
}
