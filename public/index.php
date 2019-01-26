<?php
// use \Psr\Http\Message\ServerRequestInterface as Request;
// use \Psr\Http\Message\ResponseInterface as Response;
session_start();
require __DIR__ . '/../vendor/autoload.php';
use Slim\Http\UploadedFile;
// use Illuminate\Database\Capsule\Manager as Capsule;

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

$app = new \Slim\App([
  'settings' => [
    'displayErrorDetails' => true,
    'addContentLengthHeader' => false, // Allow the web server to send the content-length header
    'logger' => [
        'name' => 'EventManagement',
        'path' =>  __DIR__ . '/../logs/api.log',
        'level' => \Monolog\Logger::DEBUG
    ],
  ]
]);

$container = $app->getContainer();


// require __DIR__ . '/../src/dependency/viewDep.php';

require __DIR__ . '/../src/dependency/loggerDep.php';


 require __DIR__ . '/../src/routes/routes.php';


$app->run();
