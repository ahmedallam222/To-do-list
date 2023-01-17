<?php

use App\Database\APP;
use App\Database\QueryBuilder;
use App\Database\DBConnection;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;


require_once 'vendor/autoload.php';
require_once 'app/App.php';
require_once 'app/Database/DBConnection.php';
require_once 'app/Database/QueryBuilder.php';
require_once 'app/core/router.php';
require_once 'app/core/request.php';
require_once 'app/controllers/TaskControllers.php';

App::set('config', require 'config.php');

$log = new Logger('PHP_BASICS');
$log->pushHandler(new StreamHandler('queries.log', Logger::INFO));



QueryBuilder::make
(
     DBConnection::make(App::get('config')['database']),
     $log
);
