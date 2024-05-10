<?php
require_once "../vendor/autoload.php";

use PhpMvc\App\Router;

Router::add('GET', '/', 'HomeController', 'index');

Router::run();