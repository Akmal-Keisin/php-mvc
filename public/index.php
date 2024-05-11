<?php
require_once "../vendor/autoload.php";

use PhpMvc\App\Controller\HomeController;
use PhpMvc\App\Router;

Router::add('GET', '/home/detail/{id}/product/{productId}', HomeController::class, 'detail');
Router::add('GET', '/', HomeController::class, 'index');
Router::add('GET', '/home', HomeController::class, 'home');

Router::run();