<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->post('/employees', function (Request $request, Response $response, $args) {
    $body = $request->getBody();
    $bodyArray = json_decode($body, true);
    $conn = $GLOBALS['conn'];
    $stmt = $conn->prepare("select password from employees where email=?");
    $stmt->bind_param("s", $bodyArray['email']);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($stmt->affected_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($bodyArray['password'], $row['password'])) {
            $stmt = $conn->prepare("select * from employees where email=?");
            $stmt->bind_param("s", $bodyArray['email']);
            $stmt->execute();
            $result = $stmt->get_result();
            $data = array();
            while ($row = $result->fetch_assoc()) {
                array_push($data, $row);
            }
            $json = json_encode($data);
        } else {
            $json = json_encode('Login fail!');
        }
    } else {
        $json = json_encode('Login fail!');
    }
    $response->getBody()->write($json);
    return $response->withHeader('content-Type', 'application/json');
});

$app->post('/employees/new', function (Request $request, Response $response, $args) {
    $body = $request->getBody();
    $bodyArray = json_decode($body, true);

    $conn = $GLOBALS['conn'];
    $stmt = $conn->prepare("select password,employeeNumber from employees where email=?");
    $stmt->bind_param("s", $bodyArray['email']);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($stmt->affected_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($bodyArray['password'], $row['password'])) {
            $conn = $GLOBALS['conn'];
            $hash = password_hash($bodyArray['newPassword'], PASSWORD_DEFAULT);
            $stmt = $conn->prepare("update employees set password=? where employeeNumber=?");
            $stmt->bind_param("ss", $hash, $row['employeeNumber']);
            $stmt->execute();
            $json =  json_encode('Update password done');
        } else {
            $json =  json_encode('Update password fail!');
        }
    } else {
        $json =  json_encode('Update password fail!');
    }
    $response->getBody()->write($json);
    return $response->withHeader('content-Type', 'application/json');
});
