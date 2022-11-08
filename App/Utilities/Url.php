<?php

namespace App\Utilities;

class Url
{
    public static function current_route(): string
    {
        return strtok($_SERVER['REQUEST_URI'], '?');
    }
}