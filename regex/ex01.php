<?php

$subject = '0388875179';

$pattern = '/^0\d{9}$/';

$check = preg_match($pattern, $subject);

var_dump($check);

//Validate email

/*
username@domain
*/
