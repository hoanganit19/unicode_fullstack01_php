<?php

$str = 'Xin chào Unicode, tôi là PHP';

//yêu cầu: Đảo chữ đầu và chữ cuối (Không làm thay đổi nội dung ở giữa)

// $firstPosition = mb_strpos($str, ' ', 0, 'UTF-8');

// $firstWord = mb_substr($str, 0, $firstPosition, 'UTF-8');

// $lastPosition = mb_strripos($str, ' ', 0, 'UTF-8') + 1;

// $lastWord = mb_substr($str, $lastPosition, null, 'UTF-8');

// $middleWord = mb_substr($str, $firstPosition, $lastPosition - $firstPosition, 'UTF-8');

// $str = $lastWord.$middleWord.$firstWord;

// echo $str.'<br/>';

//Dùng mảng
// $arr = explode(' ', $str);
// $tmp = $arr[0];
// $arr[0] = $arr[count($arr) - 1];
// $arr[count($arr) - 1] = $tmp;

// $str = implode(' ', $arr);

// echo $str.'<br>';


$password = 'unicode@123';

//Kiểm tra độ mạnh mật khẩu
/**
 * Độ dài >= 6
 * Có ít nhất 1 chữ hoa
 * Có ít nhất 1 chữ thường
 * Có ít nhất 1 số
 * Có ít nhất 1 ký tự đặc biệt: !@#$%^^&*()
 *
 */

$checkLength = false;
$checkUpper = false;
$checkLower = false;
$checkNumber = false;
$checkSpecial = false;

$number = '0123456789';
$special= '!@#$%^^&*()';

if (mb_strlen($password, 'UTF-8') >= 6) {
    $checkLength = true;

    for ($i = 0; $i < mb_strlen($password, 'UTF-8'); $i++) {
        $char = mb_substr($password, $i, 1, 'UTF-8');

        if (mb_strpos($number, $char, 0, 'UTF-8')!== false) {
            $checkNumber = true;
        }

        if (mb_strpos($special, $char, 0, 'UTF-8')!== false) {
            $checkSpecial = true;
        }

        if ($char >= 'A' && $char <= 'Z') {
            $checkUpper = true;
        }

        if ($char >= 'a' && $char <= 'z') {
            $checkLower = true;
        }
    }
}

if ($checkLength && $checkUpper && $checkLower && $checkNumber && $checkSpecial) {
    echo "Mật khẩu mạnh";
} else {
    echo "Mật khẩu yếu";
}
