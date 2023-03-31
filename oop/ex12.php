<?php

require_once 'interface/RoleInterface.php';
require_once 'interface/AccessArray.php';
require_once 'interface/AuthInterface.php';
require_once 'classes/Auth.php';
$auth = new Auth();

echo Auth::MSG.'<br/>';

//Interface => abstract class => class basic
