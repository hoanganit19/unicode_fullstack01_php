<?php

namespace Core\Databases;

use PDO;
use Exception;
use Carbon\Carbon;
use Core\Databases\Connection;

trait Database
{
    private $conn = null;
    public function __construct()
    {
        //Kết nối database => Gọi Connection
        $instance = Connection::getInstance();
        $this->conn = $instance->getConnection();
    }

    private function query($sql, $data = [], $isStatement = false)
    {
        //Trả về statement
        try {
            $statement = $this->conn->prepare($sql);
            $status = $statement->execute($data);
            if ($isStatement) {
                return $statement;
            }
            return $status;
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
    }

    private function get($sql = null, $data = [])
    {
        //fetchAll()
        if (!empty($this->table) && $sql == null) {
            $sql = "SELECT $this->fields FROM $this->table";
        }

        $statement = $this->query($sql, $data, true);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    private function first($sql = null, $condition=null, $data = [])
    {
        //fetch
        if (!empty($this->table)) {
            $sql = "SELECT $this->fields FROM $this->table";
        }

        if (!empty($condition)) {
            $sql.=' WHERE '.$condition;
        }

        $statement = $this->query($sql, $data, true);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    private function create($table = null, $attributes = [])
    {
        if (!empty($attributes)) {

            if (!empty($this->table)) {
                $table = $this->table;
            }

            if ($this->timestamps) {
                $createdAt = $this->createdAt ? $this->createdAt : 'created_at';
                $updatedAt = $this->updatedAt ? $this->updatedAt : 'updated_at';

                $attributes[$createdAt] = Carbon::now();
                $attributes[$updatedAt] = Carbon::now();

            }

            $keys = array_keys($attributes);
            $sql = "INSERT INTO $table(".implode(', ', $keys).") VALUES(".':'.implode(', :', $keys).")";
            $status = $this->query($sql, $attributes);
            return $status;
        }

        return false;
    }

    private function createGetId($table = null, $attributes = [])
    {
        $this->create($table, $attributes);
        return $this->conn->lastInsertId();
    }

    private function update($table=null, $attributes = [], $condition = null)
    {
        //$sql = "UPDATE users SET name=:name, email=:email WHERE id=1";
        if (!empty($attributes)) {

            if (!empty($this->table)) {
                $table = $this->table;
            }

            if ($this->timestamps) {
                $updatedAt = $this->updatedAt ? $this->updatedAt : 'updated_at';

                $attributes[$updatedAt] = Carbon::now();
            }


            $keys = array_keys($attributes);
            $updateStr = "";
            foreach ($keys as $key) {
                $updateStr.="$key=:$key, ";
            }

            $updateStr = rtrim($updateStr, ', ');

            if (!empty($condition)) {
                if ($this->primaryKey) {
                    $sql = "UPDATE $table SET $updateStr WHERE $this->primaryKey=$condition";
                } else {
                    $sql = "UPDATE $table SET $updateStr WHERE $condition";
                }

            } else {
                $sql = "UPDATE $table SET $updateStr";
            }

            $status = $this->query($sql, $attributes);
            return $status;
        }

        return false;
    }

    private function delete($table = null, $condition = null, $data = [])
    {
        if (!empty($this->table)) {
            $table = $this->table;
        }

        if (!empty($condition)) {
            $sql = "DELETE FROM $table WHERE $condition";
        } else {

            if (!empty($data)) {
                $sql = "DELETE FROM $table WHERE $this->primaryKey = ?";
            } else {
                $sql = "DELETE FROM $table";
            }
        }

        $status = $this->query($sql, $data);
        return $status;
    }

    private function count($sql = null, $data = [])
    {
        if (!empty($this->table)) {
            $sql = "SELECT $this->fields FROM $this->table";
        }

        //Đếm số dòng
        $statement = $this->query($sql, $data, true);
        return $statement->rowCount();
    }

    public static function __callStatic($method, $args)
    {
        //echo $method;
        return call_user_func_array([new self(), $method], $args);
    }

    public function __call($method, $args)
    {
        return call_user_func_array([$this, $method], $args);
    }
}
