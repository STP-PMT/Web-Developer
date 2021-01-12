<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->get('/products/{id}', function (Request $request, Response $response, $args) {
    $id = $args['id'];
    $response->getBody()->write("Product GET,$id");
    return $response;
});

// $app->post('/hello',function(Request $request,Response $response, $args){
//     $body = $request->getParsedBody();
//     $name = $body['name'];
//     $response->getBody()->write("Hello POST,$name");
//     return $response;
// });
?>