<?php
    session_save_path('./sessions');
    session_start();
    require_once 'config.php';
    require_once 'includes/products.php';
    require_once 'includes/functions.php';
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản phẩm</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css">
</head>

<body>
    <div class="container py-3">
        <?php
    $module = _MODULE_DEFAULT;
    if (!empty($_GET['module'])) {
        $module = $_GET['module'];
    }

    $path = 'modules/'. $module. '.php';

    if (file_exists($path)) {
        require_once $path;
    } else {
        require_once 'errors/404.php';
    }

    ?>
    </div>
</body>

</html>