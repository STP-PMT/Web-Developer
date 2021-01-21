<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->get('/products/test', function (Request $request, Response $response, $args) {
    $condb = $GLOBALS['conn'];
    $stmt = $condb->prepare('select * from products');
    $stmt->execute();
    $result =  $stmt->get_result();
    $data = array();
    while($row = $result->fetch_assoc()){
        array_push($data,$row);
    }
    $json = json_encode($data);
    $response->getBody()->write($json);
    return $response;
});

$app->get('/products/insert', function (Request $request, Response $response, $args) {

    $response->getBody()->write("Produts insert");
    return $response;
});

$app->get('/products/update', function (Request $request, Response $response, $args) {

    $response->getBody()->write("Products update");
    return $response;
});

$app->get('/products/delete', function (Request $request, Response $response, $args) {

    $response->getBody()->write("Products delete");
    return $response;
});

$app->get('/products/seacrh', function (Request $request, Response $response, $args) {

    $response->getBody()->write("Products seacrh");
    return $response;
});
