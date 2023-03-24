<?php

function query($sql, $data = [], $isStatement = false)
{
    global $conn;
    try {
        $statement = $conn->prepare($sql);
        $status = $statement->execute($data);
        if ($isStatement) {
            return $statement;
        }
        return $status;
    } catch (Exception $e) {
        //var_dump(debug_backtrace());
        require 'errors.php';
        die();
    }
}

function create($table, $attributes = [])
{
    global $conn;
    //viết được câu lệnh sql
    //$sql = "INSERT INTO users(name, email, group_id) VALUES (:name, :email, :group_id)";
    if (!empty($attributes)) {
        $keys = array_keys($attributes);
        $sql = "INSERT INTO $table(".implode(', ', $keys).") VALUES(".':'.implode(', :', $keys).")";
        $status = query($sql, $attributes);
        return $status;
    }

    return false;
}

function createGetId($table, $attributes = [])
{
    global $conn;
    create($table, $attributes);
    return $conn->lastInsertId();
}

function update($table, $attributes = [], $condition=null)
{
    global $conn;
    //$sql = "UPDATE users SET name=:name, email=:email WHERE id=1";
    if (!empty($attributes)) {
        $keys = array_keys($attributes);
        $updateStr = "";
        foreach ($keys as $key) {
            $updateStr.="$key=:$key, ";
        }

        $updateStr = rtrim($updateStr, ', ');

        if (!empty($condition)) {
            $sql = "UPDATE $table SET $updateStr WHERE $condition";
        } else {
            $sql = "UPDATE $table SET $updateStr";
        }

        $status = query($sql, $attributes);
        return $status;
    }

    return false;
}

function delete($table, $condition=null, $data = [])
{
    global $conn;
    if (!empty($condition)) {
        $sql = "DELETE FROM $table WHERE $condition";
    } else {
        $sql = "DELETE FROM $table";
    }

    $status = query($sql, $attributes);
    return $status;
}

function get($sql, $data=[])
{
    $statement = query($sql, $data, true);
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function first($sql, $data=[])
{
    $statement = query($sql, $data, true);
    return $statement->fetch(PDO::FETCH_ASSOC);
}
