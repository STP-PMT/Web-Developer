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
    $body = $request->getBody();
    $bodyArray = json_decode($body, true);

    $conn = $GLOBALS['conn'];
    $stmt = $conn->prepare('insert into products (productCode,productName,productLine,productScale,productVendor,productDescription,quantityInStock,buyPrice,MSRP) values(?,?,?,?,?,?,?,?,?)');
    $stmt->bind_param(
        'ssssssidd',
        $bodyArray['productCode'],
        $bodyArray['productName'],
        $bodyArray['productLine'],
        $bodyArray['productScale'],
        $bodyArray['productVendor'],
        $bodyArray['productDescription'],
        $bodyArray['quantityInStock'],
        $bodyArray['buyPrice'],
        $bodyArray['MSRP']
    );

    $stmt->execute();
    $result = $stmt->affected_rows;
    $response->getBody()->write($result.'');
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
