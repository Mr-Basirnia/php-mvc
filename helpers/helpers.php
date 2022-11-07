<?php

/**
 * get site domain.
 *
 * @param $route
 * @return string
 */
function site_url($route): string
{
    return $_ENV['HOST'] . $route;
}
