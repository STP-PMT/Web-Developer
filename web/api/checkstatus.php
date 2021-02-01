<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->get('/checkstatus/{seacrh_field}/{keyword}', function (Request $request, Response $response, $args) {
    $field = $args['seacrh_field'];
    $key = $args['keyword'];
    $condb = $GLOBALS['conn'];
    $stmt = $condb->prepare("select * from checkstatus,place where checkstatus.placeid = place.placeid and checkstatus.checkin like '%" . $field . "%' and checkstatus.placeid=?");
    $stmt->bind_param('i', $key);
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

// insert
$app->post('/checkstatus', function (Request $request, Response $response, $args) {
    $body = $request->getBody();
    $bodyArray = json_decode($body, true);
    $date = date("Y-m-d") . ' ' . date("H:i:s");

    $conn = $GLOBALS['conn'];
    $stmt = $conn->prepare('insert INTO checkstatus(checkin, checkout, placeid, phoneno) VALUES (?,?,?,?)');
    $stmt->bind_param(
        'ssis',
        $date,
        $date,
        $bodyArray['placeid'],
        $bodyArray['phoneno']
    );

    $stmt->execute();
    $result = $stmt->affected_rows;
    $date = array('message');
    if ($result == 1) {
        $data['message'] = 'บันทึกข้อมูลเรียบร้อย';
        $json = json_encode($data);
        $re = $response->withStatus(201);
    } else {
        $re = $response->withStatus(400);
        $data['message'] = 'บันทึกข้อมูลไม่ได้';
        $json = json_encode($data);
    }
    $re->getBody()->write($json);
    return $re->withHeader('content-Type', 'application/json');
});
