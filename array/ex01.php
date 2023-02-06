<?php
/*
Array trong php có 2 loai:
- Index array: key là số
- Associative array: key là chuỗi

1. Mảng tuần tự
- Index là số
- Tự động tăng đều: 0 1 3 4 5 6
2. Mảng hỗn hợp
- Trường hợp còn lại
*/

$customers = [
    'Hoàng An',
'Văn Tuấn',
'Văn Quân'];

$customers[10] = 'Anh';
$customers['job'] = 'Trainer';
$customers[] = 'PHP';

// $customers = [
//     'name' => 'Hoàng An',
//     'age' => 30,
//     'address' => 'Hà Nội'
// ];

echo '<pre>';
print_r($customers);
echo '</pre>';

//Duyệt mảng: foreach

//1. foreach không có key
foreach ($customers as $value) {
    echo $value.'<br/>';
}

//2. foreach có key
//$customers = '';
if (is_array($customers)) {
    foreach ($customers as $key => $value) {
        if ($key == 0) {
            continue;
        }
        echo $key.' = '.$value.'<br/>';
    }
}


//Vòng lặp foreach có thể break, continue như các vòng lặp khác

//Xóa phần tử trong mảng
unset($customers['job']);
echo '<pre>';
print_r($customers);
echo '</pre>';
