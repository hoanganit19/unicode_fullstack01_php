<?php

class Database
{
    public function table($table)
    {
        //Xử lý logic
        return $this;
    }

    public function where($field, $compare, $value)
    {
        //Xử lý logic
        return $this;
    }

    public function create($attributes = [])
    {
        echo 'created';
    }
}

$db = new Database();
// $db->table('users')->create([
//     'name' => 'hoàng an',
//     'email' => 'contact@hoàngan.com',
// ]);

// $db->table('users')->where('id', '=', 1)->update([

// ]);

//$db->table('users')->where('id', '=', 1)->delete();

//$db->table('users')->select('id', 'name')->where()->get()

//$db->table('users')->select('id', 'name')->where()->first()

$db->table('users')->where('id', '=', 1)->create([]);
