<?php

$str = 'Unicode';
echo mb_strtolower($str).'<br/>';

echo mb_strtoupper($str).'<br/>';

$file = 'home.php';

echo ucfirst($file).'<br/>';

//$fullname = 'tạ hoàng an';
$fullname = 'tạ văn ân';

echo ucwords($fullname).'<br/>';

$str = '/Tạ Hoàng An/';

var_dump(trim($str, '/'));

echo '<br/>';

var_dump(rtrim($str, '/'));

echo '<br/>';

var_dump(ltrim($str, '/'));

$description = 'Tôi là Hoàng An
Unicode Academy';

// echo nl2br($description).'<br/>';

echo str_replace("\n", "<br />\n", ($description));
echo '<br/>';
$customers = [
    'name' => 'John',
        'email' => 'john@example.com',
        'address' => '123 Main St',
        'phone' => '555-1212',
];

$json = json_encode($customers);

$customers = json_decode($json, true);
echo $customers['name'].'<br/>';

$price = 12000000;

echo number_format($price, 2, '.', ' ');

/*
preg_match()
preg_match_all()
preg_replace()
*/
