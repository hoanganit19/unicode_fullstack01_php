<?php

$user = new stdClass(); //class rỗng
$user->name = 'Hoàng An';
$user->getName = function () {
    return 'Unicode';
};
echo '<pre>';
print_r($user);
echo '</pre>';
echo $user->name.'<br/>';
$a = $user->getName;
echo $a();

/*
Không được dùng stdClass để định nghĩa phương thức
*/
