<?php

use Dotenv\Dotenv;

require_once 'vendor/autoload.php';
use App\App;

// use Core\Input;

$dotenv = Dotenv::createUnsafeImmutable(__DIR__);
$dotenv->safeLoad();

$app = new App();
// new Input();
