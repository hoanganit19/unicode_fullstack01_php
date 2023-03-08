<?php

$file = fopen('./test.txt', 'w+');
$check = is_resource($file);
var_dump($check);
