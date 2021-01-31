<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\RequestInterface as Request;

// seacrh
$app->get('/', function (Request $request, Response $response, $args) {
    include 'login.html';
    return $response;
});

$app->get('/products', function (Request $request, Response $response, $args) {
    $condb = $GLOBALS['conn'];
    $stmt = $condb->prepare('select * from products');
    $stmt->execute();
    $result =  $stmt->get_result();
    $data = array();
    while ($row = $result->fetch_assoc()) {
        array_push($data, $row);
    }
    $json = json_encode($data);
    $response->getBody()->write($json);
    // return $this->renderer->render($response, "login.html");
    return $response->withHeader('content-Type', 'application/json');
});

$app->get('/products/{seacrh_field}/{keyword}', function (Request $request, Response $response, $args) {
    $field = $args['seacrh_field'];
    $key = $args['keyword'];
    $condb = $GLOBALS['conn'];

    if ($field == 'productCode') {
        $stmt = $condb->prepare('select * from products where productCode=?');
    } else if ($field == 'productName') {
        $stmt = $condb->prepare('select * from products where productName=?');
    } else {
        die('Not found ' . $field);
    }

    $stmt->bind_param('s', $key);
    $stmt->execute();
    $result =  $stmt->get_result();
    $data = array();
    while ($row = $result->fetch_assoc()) {
        array_push($data, $row);
    }
    $json = json_encode($data);
    $response->getBody()->write($json);
    return $response->withHeader('content-Type', 'application/json');
});
