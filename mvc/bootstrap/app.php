<?php

use Core\App;

require_once '../vendor/autoload.php';

$app = new App();
$app->setConst(__DIR__);
$app->execute();
