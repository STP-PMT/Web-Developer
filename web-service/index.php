<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';

$app = AppFactory::create();
$app->setBasePath('/Web-Developer/web-service');
require __DIR__ . '/api/connect.php';
require __DIR__ .'/api/order.php';
require __DIR__ . '/api/employees.php';
require __DIR__ . '/api/menu.php';
$app->run();
//Hello
//Hello .....