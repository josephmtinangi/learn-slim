<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

require '../../vendor/autoload.php';

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

$config['db']['host'] = 'localhost';
$config['db']['user'] = 'user';
$config['db']['pass'] = 'password';
$config['db']['dbname'] = 'lean_slim';

$app = new Slim\App(['settings' => $config]);

$container = $app->getContainer();

$app->get('/', function (Request $request, Response $response, $args) {
    return $response->write("Hello");
});

$app->run();
