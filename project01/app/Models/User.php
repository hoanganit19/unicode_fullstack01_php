<?php

namespace App\Models;

use Core\Model;

class User extends Model
{
    protected $table = 'users';

    protected $createdAt = 'created_at';
    protected $updatedAt = 'update_at';

    public function getUsers()
    {
        //return $this->get("SELECT * FROM $this->table ORDER BY created_at DESC");
        return $this->paginate("SELECT * FROM $this->table ORDER BY created_at DESC", config('paginate.admin'));
    }

    public function getUser($field = 'id', $value)
    {
        return $this->first(null, "$field=?", [$value]);
    }

    public function updateUser($data, $id)
    {
        return $this->update(null, $data, $id);
    }
}
