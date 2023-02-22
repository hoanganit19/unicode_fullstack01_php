<?php
//Set timezone mặc định
date_default_timezone_set('Asia/Ho_Chi_Minh');
$timestamp = time(); //số giây từ 00:00:00 1/1/19070 đến thời điểm hiện tại

echo $timestamp.'<br/>';

//Lấy timestamp của 1 thời gian cụ thể: 19/02/2023 09:00:00

echo strtotime('2023-02-19 09:00:00').'<br/>';

//Lấy thời gian hiện tại (Theo định dạng)

echo date('d/m/Y H:i:s').'<br/>';

//Lấy thời gian theo mốc timestamp (Có định dạng)

echo date('d/m/Y H:i:s', strtotime('2023-02-19 09:00:00')).'<br/>';

//Lấy múi giờ hiện tại của Server

echo date_default_timezone_get().'<br/>';

//Thay đổi định dạng

$createdAt = '2023-02-15 06:30:30';

$dateObj = date_create($createdAt);

echo date_format($dateObj, 'd/m/Y H:i:s').'<br/>';
echo $dateObj->format('d/m/Y H:i:s').'<br/>';

$updatedAt = '20230215 06:30:30';

$dateObj = date_create_from_format('Ymd H:i:s', $updatedAt);
echo date_format($dateObj, 'd/m/Y H:i:s').'<br/>';
echo $dateObj->format('d/m/Y H:i:s').'<br/>';

//Cộng, trừ thời gian
$registerDate = '2023-02-20 04:20:50';

$timestampExpire = strtotime($registerDate.' + 1 year');

echo date('d/m/Y H:i:s', $timestampExpire).'<br/>';