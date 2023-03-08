<?php

//Cách 1: Ép kiểu array => object
$customer = [
    'name' => 'Hoàng An',
    'age' => 31,
    'address-shipping' => 'Hà Nội'
];

echo '<pre>';
print_r($customer);
echo '</pre>';

$customer = (object)$customer;
echo '<pre>';
print_r($customer);
echo '</pre>';

echo $customer->name.'<br/>';
echo $customer->age.'<br/>';
echo $customer->{"address-shipping"};
