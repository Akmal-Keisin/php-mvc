<?php

$path = "/index";
if (isset($_SERVER['PATH_INFO'])) {
    $path = $_SERVER['PATH_INFO'];
}

$dir = __DIR__ . '/../app/view' . $path . '.php';
if (!file_exists( $dir )) {
    echo "not found";
    return;
}

require $dir;