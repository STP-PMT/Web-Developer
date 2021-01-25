<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

// insert
$app->post('/products', function (Request $request, Response $response, $args) {
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
    if ($result >= 0) {
        $json = json_encode('insert ' . $result . ' row');
    }
    $response->getBody()->write($json);
    return $response;
});

// update
$app->post('/products/{update_id}', function (Request $request, Response $response, $args) {
    $update_id = $args['update_id'];
    $body = $request->getBody();
    $bodyArray = json_decode($body, true);

    $conn = $GLOBALS['conn'];
    $stmt = $conn->prepare('update products SET productCode=?,productName=?,productLine=?,productScale=?,productVendor=?,productDescription=?,quantityInStock=?,buyPrice=?,MSRP=? WHERE productCode=?');
    $stmt->bind_param(
        'ssssssidds',
        $bodyArray['productCode'],
        $bodyArray['productName'],
        $bodyArray['productLine'],
        $bodyArray['productScale'],
        $bodyArray['productVendor'],
        $bodyArray['productDescription'],
        $bodyArray['quantityInStock'],
        $bodyArray['buyPrice'],
        $bodyArray['MSRP'],
        $update_id
    );

    $stmt->execute();
    $result = $stmt->affected_rows;
    if ($result >= 0) {
        $json = json_encode('update ' . $result . ' row');
    }
    $response->getBody()->write($json);
    return $response;
});

// delete
$app->get('/products/{delete_id}', function (Request $request, Response $response, $args) {
    $delete_id = $args['delete_id'];

    $conn = $GLOBALS['conn'];
    $stmt = $conn->prepare('delete FROM products WHERE productCode=?');
    $stmt->bind_param(
        's',
        $delete_id
    );

    $stmt->execute();
    $result = $stmt->affected_rows;
    if ($result >= 0) {
        $json = json_encode('deleted ' . $result . ' row');
    }
    $response->getBody()->write($json);
    return $response;
});

// seacrh
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
