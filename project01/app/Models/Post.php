<?php

namespace App\Models;

use Core\Model;

class Post extends Model
{
    protected $table = 'posts';

    private $categoryTable = 'categories';

    private $userTable = 'users';

    public function getPosts()
    {
        return $this->paginate("SELECT p.*, c.name as category_name, c.slug as category_slug, u.name as username FROM $this->table as p INNER JOIN $this->categoryTable as c ON p.category_id = c.id INNER JOIN $this->userTable as u ON p.user_id=u.id ORDER BY p.created_at DESC", config('paginate.admin'));
    }

    public function getPost($field = 'id', $value)
    {
        return $this->first(null, "$field=?", [$value]);
    }

    public function updatePost($data, $id)
    {
        return $this->update(null, $data, $id);
    }
}

//Eloquent Relationship
