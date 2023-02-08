<?php
/*
Cho trước 1 mảng
- Sắp xếp tăng dần
- Chèn vào 1 phần tử => Không làm thay đổi thứ tự sắp xếp tăng
*/

$numbers = [
    5, 9, 1, 8, 20, -10
];

sort($numbers);

echo '<pre>';
print_r($numbers);
echo '</pre>';

$insert = 10;

$key = null;

if ($insert<=$numbers[0] || $insert >= $numbers[count($numbers)-1]) {
    if ($insert<=$numbers[0]) {
        $key = 0;
    } else {
        $key = count($numbers);
    }
} else {
    for ($i = 0; $i<count($numbers)-1; $i++) {
        if ($insert >= $numbers[$i] && $insert <= $numbers[$i+1]) {
            $key = $i+1;
        }
    }
}


$sub = array_slice($numbers, $key); //Clone từ vị trí key đến hết mảng

array_splice($numbers, $key); //Xóa từ vị trí key đến hết mảng

$numbers[$key] = $insert;

$numbers = array_merge($numbers, $sub);

echo '<pre>';
print_r($numbers);
echo '</pre>';

// for ($i = 0; $i < count($numbers); $i++) {
// }
