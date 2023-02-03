<?php

$str = 'Khóa học php';
var_dump($str);

/*
 - Chuỗi trong PHP sẽ bị lỗi với Tiếng Việt có dấu
 - Để xử lý Tiếng Việt có dấu trong php => Sử dụng thêm php extensions: mbstring
*/

//phpinfo();

for ($i = 0; $i<mb_strlen($str, 'UTF-8'); $i++) {
    //echo $str[$i].'<br/>';
    //echo mb_substr($str, $i, 1, 'UTF-8').'<br/>';
}

echo '<br/>';

//So sánh 2 ký tự trong php

$a = 'A';
$b = 'a';

echo ord($a).'<br/>';
echo ord($b).'<br/>';