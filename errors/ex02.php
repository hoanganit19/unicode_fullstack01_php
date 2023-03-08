<?php

try {
    echo a();
    //echo $a;
    $b = 10;
    if ($b<15) {
        throw new Exception('$b phải lớn hơn hoặc bằng 15');
    }
} catch(Error $exception) {
    echo 'Đã có lỗi xảy ra liên quan đến dịch chương trình: <br/>';
    echo $exception->getMessage().'<br/>';
    echo $exception->getFile().'<br/>';
    echo $exception->getLine().'<br/>';
} catch(Exception $exception) {
    echo 'Đã có lỗi xảy ra liên quan đến logic: <br/>';
    echo $exception->getMessage().'<br/>';
    echo $exception->getFile().'<br/>';
    echo $exception->getLine().'<br/>';
}

echo 'Unicode';
