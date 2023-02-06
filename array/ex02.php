<?php

$customers = [
    [
        'name' => 'Hoàng An',
        'email' => 'hoan.ng@gmail.com',
    ],

    [
        'name' => 'Hàng An',
        'email' => 'hann.ng@gmail.com',
    ],

    [
        'name' => 'Hàng An',
        'email' => 'hann.ng@gmail.com',
    ]
];

$customers[0]['address'] = 'Hà Nội';
$customers[0][] = 'Test';

echo '<pre>';
print_r($customers);
echo '</pre>';

foreach ($customers as $customer) {
    echo $customer['name'].'<br/>';
}

echo '<pre>';
print_r($_SERVER);
echo '</pre>';
