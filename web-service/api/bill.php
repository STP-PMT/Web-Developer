<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

// insert
$app->post('/receipt', function (Request $request, Response $response, $args) {
    $body = $request->getBody();
    $bodyArray = json_decode($body, true);
    $data = json_encode($bodyArray['data'], true);
    echo ($data);

    $conn = $GLOBALS['conn'];
    $stmt = $conn->prepare('insert into receipt (menuID,tableID,date,data) values(?,?,?,?)');
    $stmt->bind_param(
        'iiss',
        $bodyArray['menuID'],
        $bodyArray['tableID'],
        $bodyArray['date'],
        $data
    );

    $stmt->execute();
    $result = $stmt->affected_rows;
    $response->getBody()->write($result . '');
    return $response;
});

// $app->get('/receipt', function (Request $request, Response $response, $args) {
//     $conn = $GLOBALS['conn'];
//     $stmt = $conn->prepare('select max(ID) from receipt');
//     $stmt->execute();
//     $result =  $stmt->get_result();
//     $data = array();
//     while ($row = $result->fetch_assoc()) {
//         array_push($data, $row);
//     }
//     $json = json_encode($data);
//     $response->getBody()->write($json);
//     return $response->withHeader('content-Type', 'application/json');
// });
