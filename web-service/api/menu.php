<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


$app->get('/menu', function (Request $request, Response $response, $args) {
    $condb = $GLOBALS['conn'];
    $stmt = $condb->prepare('select * from menu');
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
