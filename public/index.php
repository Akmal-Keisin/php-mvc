<?php
require_once "../vendor/autoload.php";

use PhpMvc\App\Controller\HomeController;
use PhpMvc\App\Middleware\AuthMiddleware;
use PhpMvc\App\System\Router;

Router::add('GET', '/', HomeController::class, 'index', [AuthMiddleware::class]);
Router::add('GET', '/home', HomeController::class, 'home');
Router::add('GET', '/login', HomeController::class, 'index', [AuthMiddleware::class]);
Router::add('GET', '/home/detail/{id}/product/{productId}', HomeController::class, 'detail');

Router::run();