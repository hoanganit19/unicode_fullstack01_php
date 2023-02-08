<?php

$customers = [
    'An',
    'Anh',
    'Tuấn',
    'a' => 'A'
];

// unset($customers[0]);

// $customers = array_values($customers);

$customers = array_merge($customers, ['Item 1', 'Item 2']);

echo '<pre>';
print_r($customers);
echo '</pre>';


/*
Có thể cộng 2 mảng được không?
*/

// $test1 = [
//    'A',
//    'B',
//    'C'
// ];

// $test2 = [
//     'Item 1',
//     'Item 2'
// ];

// $test = array_merge($test1, $test2);

// echo '<pre>';
// print_r($test);
// echo '</pre>';

$urls = [
    'https://vnexpress.net',
    'https://dantri.com.vn',
    'https://hoangan.net',
    'https://unicode.vn',
    'https://vietnamnet.vn',
    ''
];

//$search = array_search('https://vnexpress.net', $urls);

// $check = in_array('https://vnexpress.net', $urls);

// var_dump($check);

//Lấy phần tử đầu tiên
$first = reset($urls);

//Lấy phần tử cuối cùng
$last = end($urls);

//$urls = array_filter($urls);

$result = array_filter(
    $urls,
    fn ($url) => $url === 'https://unicode.vn'
);

echo '<pre>';
print_r($urls);
echo '</pre>';

$result = array_map(fn ($url) => '<a href="'.$url.'">'.$url.'</a>', array_filter($urls));

// echo '<pre>';
// print_r($result);
// echo '</pre>';

$records = array(
    array(
        'id' => 2135,
        'first_name' => 'John',
        'last_name' => 'Doe',
    ),
    array(
        'id' => 3245,
        'first_name' => 'Sally',
        'last_name' => 'Smith',
    ),
    array(
        'id' => 5342,
        'first_name' => 'Jane',
        'last_name' => 'Jones',
    ),
    array(
        'id' => 5623,
        'first_name' => 'Peter',
        'last_name' => 'Doe',
    )
);

// echo '<pre>';
// print_r(array_column($records, 'first_name'));
// echo '</pre>';
// $key = array_search('Sally', array_column($records, 'first_name'));

// echo '<pre>';
// print_r($records[$key]);

// echo '</pre>';

$result = array_filter($records, fn ($record) => $record['first_name'] == 'John');

// $nameArr = [
//     'Hoàng An',
//     30
// ];

$nameArr = [
    'name' => 'Hoàng An',
    'age1' => 30
];

//list($name, $age) = $nameArr;
//[$name, $age] = $nameArr;
$nameArr = extract($nameArr);

echo $name.'<br/>';
echo $age1.'<br/>';

//Controller
//=> Gửi data sang view: view('add.php', ['title' => 'Add User']);

//view: add.php
//echo $title

$title = 'Add User';
$content = 'Content User';
$age = 30;

$arr = compact('title', 'content', 'age');

echo '<pre>';
print_r($arr);
echo '</pre>';
