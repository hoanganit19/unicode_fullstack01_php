<?php

$customerName = 'Hoàng An';

//echo '<h1>Khóa học Fullstack Web '.$customerName.'</h1>';

echo "<h1>Khóa học Fullstack Web {$customerName}tại Unicode</h1>";

$a = 1;
$b = 2;

echo "<h2>Kết quả tính tổng là: ".($a + 1).'</h2>';

echo "1"+2;


echo '<br/>';


//Debug
var_dump($a); //Trả về kiểu dữ liệu và giá trị

echo '<br/>';
var_dump($customerName);

echo '<br/>';

$arr = [1,2,3,4];
// echo '<pre>';
// var_dump($arr);
// echo '</pre>';

echo '<pre>';
print_r($arr);
echo '</pre>';

/*
- Để debug mảng, object => dùng print_r
- Để debug có kiểu dữ liệu => dùng var_dump
*/

/*
Các kiến thức sau sẽ xem lại phần js
- toán tử, biểu thức
- câu điều kiện
- vòng lặp
- break, continue
- định nghĩa hàm
*/

// function getMessage()
// {
//     echo 'Nội dung thông báo';
// }

// $getMessage = function () {
//     echo 'Nội dung thông báo';
// };

// $getMessage();

// $getMessage = fn () => 'Nội dung thông báo';

// echo $getMessage();

function getMessage($a, $b=0, $c=0, $d=0)
{
    echo $a.'<br/>';
    echo $b.'<br/>';
    echo $c.'<br/>';
    echo $d.'<br/>';
}

getMessage(1, d: 4); //php8

//Từ php7.4 trở lên => Hỗ trợ khai báo kiểu dữ liệu cho các tham số hàm và kiểu dữ liệu của

function getTotal(int $a, int $b): int
{
    return $a+$b;
}

echo getTotal(1.1, 5);
echo '<br/>';
//Tham chiếu
$a = 1;
$b = &$a;
$b = 2;
echo 'a = '.$a.'<br/>';
echo 'b = '.$b.'<br/>';


function setMessage(&$value)
{
    $value.=' - PHP';
}

$mesage = 'Unicode';
setMessage($mesage);
echo $mesage;

//Ví dụ áp dụng tham chiếu khi định nghĩa hàm

$arr = [
    'Item 1'
];

array_push($arr, 'Item2'); //array.push('item')

echo '<pre>';
print_r($arr);
echo '</pre>';

//Biến toàn cục
$name = 'Hoàng An';
function setName()
{
    global $name; //sử dụng biến toàn cục
    $name = 'Hoàng An Unicode';
}

setName();

echo $name;

echo  '<br/>';

//Sử dụng biến toàn cục với hàm ẩn danh

$age = 30;
$getAge = function () use ($age, $name) {
    echo $age;
};

$getAge();

echo  '<br/>';

$customers = [];
$customers[] = 'Hoàng An';
$customers[] = 'Tuấn';
$customers['age'] = 30;

echo '<pre>';
print_r($customers);
echo '</pre>';

$users = [
    'name' => 'Hoàng An',
    'age' => 31
];

echo '<pre>';
print_r($users);
echo '</pre>';