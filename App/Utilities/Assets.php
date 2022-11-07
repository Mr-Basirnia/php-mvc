<?php

namespace App\Utilities;

class Assets
{
    /**
     * get css.
     *
     * @param string $route
     * @return string
     */
    public static function get_css(string $route): string
    {
        return $_ENV['HOST'] . 'assets/' . $route;
    }
}