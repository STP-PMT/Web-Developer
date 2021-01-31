
<?php
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';

$app = AppFactory::create();
$app->setBasePath('/Web-Developer/demo-web');
require __DIR__ . '/api/connect.php';
require __DIR__ . '/api/products.php';

$app->run();
?>
