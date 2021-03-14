<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

// insert
$app->post('/receipt', function (Request $request, Response $response, $args) {
    $body = $request->getBody();
    $bodyArray = json_decode($body, true);
    $data = json_encode($bodyArray['data'], true);

    $conn = $GLOBALS['conn'];
    $stmt = $conn->prepare('insert into receipt (tableID,date,data,sum) values(?,?,?,?)');
    $stmt->bind_param(
        'issi',
        $bodyArray['tableID'],
        $bodyArray['date'],
        $data,
        $bodyArray['sum']
    );

    $stmt->execute();
    $result = $stmt->affected_rows;
    $response->getBody()->write($result . '');
    return $response;
});

$app->get('/receiptmax', function (Request $request, Response $response, $args) {
    $conn = $GLOBALS['conn'];
    $stmt = $conn->prepare('select max(ID) as max from receipt');
    $stmt->execute();
    $result =  $stmt->get_result();
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data = $row['max'];
    }
    $json = json_encode($data);
    $response->getBody()->write($json);
    return $response->withHeader('content-Type', 'application/json');
});

$app->get('/receipt', function (Request $request, Response $response, $args) {
    $conn = $GLOBALS['conn'];
    $stmt = $conn->prepare('select ID,tableID,date,sum from receipt');
    $stmt->execute();
    $result =  $stmt->get_result();
    $data =array();
    while ($row = $result->fetch_assoc()) {
        array_push($data,$row);
    }
    $json = json_encode($data);
    $response->getBody()->write($json);
    return $response->withHeader('content-Type', 'application/json');
});

$app->get('/receipt/{id}', function (Request $request, Response $response, $args) {
    $id = $args['id'];
    $conn = $GLOBALS['conn'];
    $stmt = $conn->prepare('select data from receipt where ID = ?');
    $stmt->bind_param(
        'i',
        $id
    );
    $stmt->execute();
    $result =  $stmt->get_result();
    
    $data =array();
    while ($row = $result->fetch_assoc()) {
        $data=json_decode($row['data']);
        // array_push($data,json_decode($row['data']));
    }
    $json = json_encode($data);
    $response->getBody()->write($json);
    return $response->withHeader('content-Type', 'application/json');
});

$app->get('/receiptsum/{id}', function (Request $request, Response $response, $args) {
    $id = $args['id'];
    $conn = $GLOBALS['conn'];
    $stmt = $conn->prepare('select sum from receipt where ID = ?');
    $stmt->bind_param(
        'i',
        $id
    );
    $stmt->execute();
    $result =  $stmt->get_result();
    
    $data =array();
    while ($row = $result->fetch_assoc()) {
        $data=json_decode($row['sum']);
        // array_push($data,json_decode($row['data']));
    }
    $json = json_encode($data);
    $response->getBody()->write($json);
    return $response->withHeader('content-Type', 'application/json');
});
