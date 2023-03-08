<?php

require_once 'connect.php';

try {
    //bước 1: viết câu lệnh sql
    $sql = "SELECT * FROM users";

    //Bước 2: Tạo statements

    $statement = $conn->prepare($sql);

    //Bind the statement
    $data = [
        // 'id' => 1,
        // 'email' => '%nguyenvana%'
    ];

    //Bước 3: Thực thi câu lệnh
    $status = $statement->execute($data); //Thành công => true, ngược lại false
} catch(Exception $e) {
    echo 'Erorrs: '.$e->getMessage().'<br/>';
    echo 'File: '.$e->getFile().'<br/>';
    echo 'Line: '.$e->getLine().'<br/>';
}

//Riêng get dữ liệu => Thêm bước 4

//Bước 4: lấy dữ liệu

 $users = $statement->fetchAll(PDO::FETCH_ASSOC);

// echo '<pre>';
// print_r($users);
// echo '</pre>';

// $user = $statement->fetch(PDO::FETCH_ASSOC);
echo json_encode($users);

header('Content-Type: application/json');