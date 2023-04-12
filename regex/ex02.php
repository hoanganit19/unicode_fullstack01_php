<?php

$content = 'xin https://unicode.vn chao toi hoangan@gmail.com la Ta Hoang https://hoangan.net An test@unicode.vn';

//$pattern = '/([a-z]+[a-z-_\.0-9]{2,})@([a-z]+[a-z\.-_0-9]*\.[a-z]{2,})/';

$pattern = '/((?:https|http):\/\/(?:www\.|)[a-z]+\.[a-z]{2,}(?:\/.+|))/';

preg_match_all($pattern, $content, $matches);

echo '<pre>';
print_r($matches);
echo '</pre>';
