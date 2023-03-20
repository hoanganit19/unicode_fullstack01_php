<?php

require_once 'mail.php';
//sendMail('hoangan.web@gmail.com', 'Kích hoạt tài khoản', 'Vui lòng kích hoạt tài khoản');

$data = file_get_contents('http://www.geoplugin.net/php.gp?ip=42.116.243.165');

$data = unserialize($data);
echo '<pre>';
print_r($data);
echo '</pre>';
