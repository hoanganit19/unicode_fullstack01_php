<?php

//Định nghĩa bằng define()
//Nên đặt tên theo cú pháp undercore và viết HOA: WEB_HOST_ROOT, BASE_PATH
//Thêm gạch dưới phía trước: _WEB_ROOT
define('WEB_HOST_ROOT', 'https://unicode.vn');

echo WEB_HOST_ROOT;

echo '<br/>';

$a = 'unicode';

const BASE_URL = 'https://vnexpress.net';

echo BASE_URL;

echo '<br/>';

//Hàm kiểm tra hằng số tồn tại
if (defined('BASE_URL')) {
    echo 'Tồn tại';
} else {
    echo 'Không tồn tại';
}

/*
Phạm vi truy cập của hằng số => Mọi nơi
*/