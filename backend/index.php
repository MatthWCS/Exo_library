<?php
require_once __DIR__ . "/vendor/autoload.php";
require_once 'App/Core/utils.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();




// session_start();
// // on instancie le router
$router = new App\Core\Router();

$router->run();