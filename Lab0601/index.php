<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';

$app = AppFactory::create();
$app->setBasePath('/Web-Developer/Lab0601');

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello,world!");
    return $response;
});

$app->run();
