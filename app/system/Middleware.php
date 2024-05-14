<?php

namespace App\System;

interface Middleware 
{
    function before(): void;
}