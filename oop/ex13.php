<?php

require_once 'traits/TestTrait.php';
require_once 'traits/QueryBuilder.php';
require_once 'classes/DB.php';

$db = new DB();
// $db->table('users');
// echo $db->get();
//echo $db->getTable();
echo $db->test();
