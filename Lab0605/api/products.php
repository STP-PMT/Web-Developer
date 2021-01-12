<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->get('/products', function (Request $request, Response $response, $args) {

    $conn = $GLOBALS['dbconn'];
    $sql = "select * from products";
    $result = $conn->query($sql);
    //$num = $result->num_rows;
    $data = array();
    while ($row = $result->fetch_assoc()) {
        array_push($data, $row);
    }
    $json = json_encode($data);

    $response->getBody()->write($json);
    return $response->withHeader('content-Type', 'application/json');
});

$app->get('/products/{products_code}', function (Request $request, Response $response, $args) {
    $products_code = $args['products_code'];
    $conn = $GLOBALS['dbconn'];
    $stmt = $conn->prepare('select * from products where productCode=?');
    $stmt->bind_param('s', $products_code);
    $stmt->execute();

    $result = $stmt->get_result();
    //$num = $result->num_rows;
    $data = array();
    while ($row = $result->fetch_assoc()) {
        array_push($data, $row);
    }
    $json = json_encode($data);

    $response->getBody()->write($json);
    return $response->withHeader('content-Type', 'application/json');
});

//post -> insert data or update data
$app->post('/products', function (Request $request, Response $response, $args) {
    $body = $request->getBody();
    $bodyArray = json_decode($body, true);

    $conn = $GLOBALS['dbconn'];
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

$app->post('/products/{products_code}', function (Request $request, Response $response, $args) {
    $body = $request->getBody();
    $bodyArray = json_decode($body, true);
    //Change to update statment
    $conn = $GLOBALS['dbconn'];
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
