<h1>Unicode Academy</h1>
<?php
echo '<pre>';
print_r($_GET);
echo '</pre>';
$basePath = dirname($_SERVER['SCRIPT_NAME']);
$requestUri = parse_url($_SERVER['REQUEST_URI']);

$path = str_replace($basePath, '', $requestUri['path']);

echo $path;
