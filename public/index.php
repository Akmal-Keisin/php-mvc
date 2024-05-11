<?php
require_once "../vendor/autoload.php";

use PhpMvc\App\Controller\HomeController;
use PhpMvc\App\Router;

Router::add('GET', '/', HomeController::class, 'index');

Router::run();