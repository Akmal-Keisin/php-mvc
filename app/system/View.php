<?php

namespace PhpMvc\App\System;

class View
{
    public static function render(string $view, $data)
    {
        require __DIR__ . '/../view/' . $view;
    }
}