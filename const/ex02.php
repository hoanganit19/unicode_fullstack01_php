<?php

//Lấy file đang thực thi
echo __FILE__.'<br/>';

//Lấy thư mục của file đang thực thi

echo __DIR__.'<br/>';

echo dirname(__FILE__).'<br/>';

echo $_SERVER['DOCUMENT_ROOT'].'<br/>';

echo $_SERVER['HTTP_HOST'].'<br/>';

echo '<pre>';
print_r($_SERVER);
echo '</pre>';

function testA()
{
    echo __LINE__.'<br/>';
    echo __FUNCTION__.'<br/>';
}

testA();

echo basename(__FILE__);