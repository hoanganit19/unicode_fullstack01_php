<?php

$password1 = '123456';
echo md5($password1).'<br/>';

$password2 = '123456';
echo md5($password2).'<br/>';

$password = '123456';
// $hash = password_hash($password, PASSWORD_DEFAULT);
// echo $hash.'<br/>';

$hash = '$2y$10$MNeHo2c1Re2FI/lmW4rh4.iSvg8ImmKGcracVYsSzZ5S65q0Iyz.W'; //lấy từ database

$check = password_verify($password, $hash);
var_dump($check);
