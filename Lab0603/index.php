<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';

$app = AppFactory::create();
$app->setBasePath('/Web-Developer/Lab0603');

$app->get('/hello/{name}', function (Request $request, Response $response, $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello GET,$name");
    return $response;
});

$app->post('/hello',function(Request $request,Response $response, $args){
    $body = $request->getParsedBody();
    $name = $body['name'];
    $response->getBody()->write("Hello POST,$name");
    return $response;
});

$app->run();
