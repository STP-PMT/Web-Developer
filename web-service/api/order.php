<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

// insert
$app->post('/order', function (Request $request, Response $response, $args) {
    $body = $request->getBody();
    $bodyArray = json_decode($body, true);

    $conn = $GLOBALS['conn'];
    $stmt = $conn->prepare('insert into manage (menuID,tableID,amount,total) values(?,?,?,?)');
    $stmt->bind_param(
        'iiii',
        $bodyArray['menuID'],
        $bodyArray['tableID'],
        $bodyArray['amount'],
        $bodyArray['total']
    );

    $stmt->execute();
    $result = $stmt->affected_rows;
    $response->getBody()->write($result . '');
    return $response;
});

// update
$app->post('/order/{menu_id}/{table_id}', function (Request $request, Response $response, $args) {
    $menu_id = $args['menu_id'];
    $table_id =$args['table_id'];
    $body = $request->getBody();
    $bodyArray = json_decode($body, true);

    $conn = $GLOBALS['conn'];
    $stmt = $conn->prepare('update manage SET amount=?,total=? WHERE menuID=? and tableID=?');
    $stmt->bind_param(
        'iiii',
        $bodyArray['amount'],
        $bodyArray['total'],
        $menu_id,
        $table_id
    );

    $stmt->execute();
    $result = $stmt->affected_rows;
    $response->getBody()->write($result.'');
    return $response;
});

// delete
$app->get('/order/{menu_id}/{table_id}', function (Request $request, Response $response, $args) {
    $menu_id = $args['menu_id'];
    $table_id = $args['table_id'];

    $conn = $GLOBALS['conn'];
    $stmt = $conn->prepare('delete FROM manage WHERE menuID=? and tableID=?');
    $stmt->bind_param(
        'ii',
        $menu_id,
        $table_id
    );

    $stmt->execute();
    $result = $stmt->affected_rows;
    if ($result >= 0) {
        $json = json_encode('deleted ' . $result . ' row');
    }
    $response->getBody()->write($json);
    return $response;
});

$app->get('/manage/{table_id}', function (Request $request, Response $response, $args) {
    $table_id = $args['table_id'];
    $conn = $GLOBALS['conn'];
    $stmt = $conn->prepare('delete FROM manage WHERE tableID=?');
    $stmt->bind_param(
        'i',
        $table_id
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
$app->get('/order/{id}', function (Request $request, Response $response, $args) {
    $id = $args['id'];
    $condb = $GLOBALS['conn'];
    $stmt = $condb->prepare('select tableID,menuID,menuName,menuPrice,amount,total,menu.groups FROM menu,manage WHERE menu.ID = menuID and tableID =?');
    $stmt->bind_param(
        'i',$id
    );
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
//sum order total
$app->get('/ordersum/{id}', function (Request $request, Response $response, $args) {
    $id = $args['id'];
    $condb = $GLOBALS['conn'];
    $stmt = $condb->prepare('select SUM(total) as sum FROM menu,manage WHERE menu.ID = menuID and tableID =?');
    $stmt->bind_param(
        'i',$id
    );
    $stmt->execute();
    $result =  $stmt->get_result();
    $data = array();
    while ($row = $result->fetch_assoc()) {
        array_push($data, $row["sum"]);
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
