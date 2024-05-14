<?php

namespace PhpMvc\App\Middleware;

use App\System\Middleware;

class AuthMiddleware implements Middleware
{
    public function before(): void
    {
        session_start();
        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit();
        }
    }
}