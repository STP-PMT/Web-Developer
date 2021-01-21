<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->get('/employees/insert', function (Request $request, Response $response, $args) {

    $response->getBody()->write("Employees insert");
    return $response;
});

$app->get('/employees/update', function (Request $request, Response $response, $args) {

    $response->getBody()->write("Employees update");
    return $response;
});

$app->get('/employees/delete', function (Request $request, Response $response, $args) {

    $response->getBody()->write("Employees delete");
    return $response;
});

$app->get('/employees/seacrh', function (Request $request, Response $response, $args) {

    $response->getBody()->write("Employees seacrh");
    return $response;
});
