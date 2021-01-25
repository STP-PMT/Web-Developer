<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->post('/employees', function (Request $request, Response $response, $args) {
    $body = $request->getBody();
    $bodyArray = json_decode($body, true);
    $conn = $GLOBALS['conn'];
    $stmt = $conn->prepare("select password from employees where email=?");
    $stmt->bind_param("s",$bodyArray['email']);
    $stmt->execute();
    $result=$stmt->get_result();
    $row = $result->fetch_assoc();

    if(password_verify($bodyArray['password'],$row['password'])){
        $stmt = $conn->prepare("select * from employees where email=?");
        $stmt->bind_param("s",$bodyArray['email']);
        $stmt->execute();
        $result=$stmt->get_result();
        $data = array();
        while($row = $result->fetch_assoc()){
            array_push($data,$row);
        }
        $json = json_encode($data);
        $response->getBody()->write($json);
    }else{
        echo 'Login Fail';
    }
    
    return $response->withHeader('content-Type', 'application/json');
});
