<?php

session_save_path('./logs');
session_name('unicode');
if (!session_id()) {
    session_start();
}

//Gán session
$_SESSION['name'] = 'hoangan';
$_SESSION['customers'] = [
    'name' => 'hoangan',
    'email' => 'hoangan@gmail.com',

];

//Đọc session
// $name = $_SESSION['name'];
// echo $name.'<br/>';
// $customers = $_SESSION['customers'];
// echo '<pre>';
// print_r($customers);
// echo '</pre>';

//cập nhật session
//$_SESSION['name'] = 'hoangan2';

//Xóa session

//1. Xóa 1 session
//unset($_SESSION['name']);

//2. Xóa tất cả session

//2.1. session_destroy(); //Xóa cả file session

//2.2: session_unset(); //Xóa nội dung file session

//session_destroy();

//session_unset();
