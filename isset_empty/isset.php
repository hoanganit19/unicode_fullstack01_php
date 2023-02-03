<?php

$a = null;
if (isset($a)) {
    echo 'Đúng';
} else {
    echo 'Sai';
}

/*
- Hàm isset chỉ kiểm tra biến tồn tại, ko kiểm tra dữ liệu (Không kiểm tra được null)
- Hàm isset không kiểm tra đc biến có kiểu dữ liệu null
*/