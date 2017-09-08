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

$container['logger'] = function ($c) {
    $logger = new \Monolog\Logger('my_logger');
    $file_handler = new \Monolog\Handler\StreamHandler("../logs/app.log");
    $logger->pushHandler($file_handler);
    return $logger;
};

$container['db'] = function ($c) {
  $db = $c['settings']['db'];

  $pdo = new PDO("mysql:host=".$db['host'].";dbnme=".$db['dbname'], $db['user'], $db['pass']);

  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

  return $pdo;
};

$app->get('/', function (Request $request, Response $response, $args) {
    return $response->write("Hello");
});

$app->run();
