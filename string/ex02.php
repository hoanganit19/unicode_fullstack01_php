<?php

//Các hàm xử lý chuỗi

$str = 'Trung tâm \ đào tạo "Unicode" Academy';

echo addcslashes($str, 't').'<br/>';

echo addslashes($str).'<br/>';

//=> Giải quyết vấn đề bảo mật: SQL Injection

$fullname = 'Tạ Hoàng An';
$arr = explode(' ', $fullname);
echo '<pre>';
print_r($arr);
echo '</pre>';

echo implode('-', $arr).'<br/>';

echo str_repeat('An', 5).'<br/>';

echo str_replace('Unicode', 'Google', $str).'<br/>'; //không hỗ trợ biểu chức chính quy

//preg_replace, preg_match, preg_match_all

echo md5('123456').'<br/>';
echo sha1('123456').'<br/>';
$token = sha1(md5(uniqid()));
echo $token.'<br/>';

$keyword = '<b>Hoàng An Ubicode</b>';
echo htmlentities($keyword).'<br/>';

$content = '<h1>Unicode</h1><p><b>Đào tạo lập trình</b></p>';

echo strip_tags($content, '<b>').'<br/>';

$fullname = 'Tạ Hoàng An';

echo mb_substr($fullname, 5, null, 'UTF-8').'<br/>';

$email = '@hoangan.web@unicode.vn';

$domain = mb_strstr($email, '@');
$domain = str_replace('@', '', $domain);
echo $domain.'<br/>';

$pos = mb_strpos($email, '@', 0, 'UTF-8');

if ($pos!==false) {
    echo 'Đúng';
} else {
    echo 'Sai';
}