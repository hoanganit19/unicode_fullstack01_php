<?php

require_once 'config.php';
//Kiểm tra xem PDO có được hỗ trợ trên server hay không?


if (class_exists('PDO')) {
    try {
        $dsn = _DRIVER.':dbname='._DB.';host='._HOST;

        $options = [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', //Set utf8
        ];

        $conn = new PDO($dsn, _USER, _PASSWORD, $options);

        //var_dump($conn);
    } catch(Exception $e) {
        require 'errors.php';
        die();
    }
} else {
    echo 'Vui lòng kích hoạt PDO để sử dụng';
}