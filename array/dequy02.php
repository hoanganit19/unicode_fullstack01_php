<?php

require_once 'includes/functions.php';
$menus = [
    [
        'id' => 12,
        'title' => 'Sản phẩm 1.3',
        'link' => '#',
        'parent' => 6
    ],
    [
        'id' => 1,
        'title' => 'Trang chủ',
        'link' => '#',
        'parent' => 0
    ],

    [
        'id' => 2,
        'title' => 'Giới thiệu',
        'link' => '#',
        'parent' => 0
    ],

    [
        'id' => 3,
        'title' => 'Sản phẩm',
        'link' => '#',
        'parent' => 0,

    ],

    [
        'id' => 4,
        'title' => 'Tin tức',
        'link' => '#',
        'parent' => 0
    ],

    [
        'id' => 5,
        'title' => 'Liên hệ',
        'link' => '#',
        'parent' => 0
    ],

    [
        'id' => 6,
        'title' => 'Sản phẩm 1',
        'link' => '#',
        'parent' => 3
    ],

    [
        'id' => 7,
        'title' => 'Sản phẩm 2',
        'link' => '#',
        'parent' => 3
    ],

    [
        'id' => 8,
        'title' => 'Sản phẩm 3',
        'link' => '#',
        'parent' => 3
    ],

    [
        'id' => 9,
        'title' => 'Sản phẩm 4',
        'link' => '#',
        'parent' => 3
    ],

    [
        'id' => 10,
        'title' => 'Sản phẩm 1.1',
        'link' => '#',
        'parent' => 6
    ],

    [
        'id' => 11,
        'title' => 'Sản phẩm 1.2',
        'link' => '#',
        'parent' => 6
    ]
];

$nested = buildNested($menus);
// echo '<pre>';
// print_r($nested);
// echo '</pre>';

echo '<select>';
getMenuSelect($menus);
echo '</select>';
