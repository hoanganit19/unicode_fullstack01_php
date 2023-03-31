<?php

require_once 'classes/Model.php';
require_once 'classes/User.php';
$user = new User();
echo $user->get().'<br/>';

$user->setMessage('Học PHP tại Unicode');
echo $user->getMessage().'<br/>';
