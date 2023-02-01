<?php
/*
1. Kiểu số nguyên: int, integer => is_int()
2. Kiểu số thực: float => is_float()
3. Kiểu chuỗi: string: => is_string()
4. Kiểu null: is_null()
5. Kiểu boolean: is_bool()
6. Kiểu mảng: is_array()
7. Kiểu object: is_object()
8. Kiểu Resource: Khi kết nối với các tài nguyên bên ngoài php: database, curl, file,...
is_resource()
9. Kiểu Callable (callback): is_callable()

Ép kiểu trong php theo cú pháp
(tenkieu)$tenbien
*/

$a = '1';
$a = (float)$a;
var_dump($a);
echo '<br/>';
class Person
{
}

$person = new Person();
var_dump($person);

echo '<br/>';

$file = fopen('data.txt', 'w+');
var_dump($file);