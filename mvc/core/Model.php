<?php

namespace Core;

use Core\Databases\Connection;

class Model
{
    private $conn = null;
    public function __construct()
    {
        //Kết nối database => Gọi Connection
        $instance = Connection::getInstance();
        $this->conn = $instance->getConnection();
    }

    public function query($sql)
    {
        //Trả về statement
    }


    public function get($sql)
    {
        //fetchAll()
    }

    public function first($sql)
    {
        //fetch
    }

    public function create($table, $data = [])
    {

    }

    public function update($table, $data = [], $condition = null)
    {

    }

    public function remove($table, $condition = null)
    {

    }

    public function count($sql)
    {
        //Đếm số dòng
    }
}
