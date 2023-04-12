<?php

$content = 'Unicode contact@unicode.vn Academy 0388875179 vsjdid 0388875179 fwsfs dcs https://unicode.vn/ dsfsdf https://vnexpress.net/tim-thay-thi-the-nan-nhan-cuoi-cung-vu-truc-thang-roi-4590567.html fvdsfvd csdc http://dantri.com csdfc';
//$pattern = '/0(\d{9})/';
$pattern = '/(0\d{9})/';

//$content = preg_replace($pattern, '+84$1', $content);
$content = preg_replace($pattern, '<a href="tel:$1">$1</a>', $content);

$pattern = '/([a-z]+[a-z-_\.0-9]{2,}@[a-z]+[a-z\.-_0-9]*\.[a-z]{2,})/';

$content = preg_replace($pattern, '<a href="mailto:$1">$1</a>', $content);

$pattern = '/((?:https|http):\/\/(?:www\.|)[a-z]+\.[a-z]{2,}(?:\/\S+|))/';

$content = preg_replace($pattern, '<a href="$1" target="_blank">$1</a>', $content);

echo $content;
