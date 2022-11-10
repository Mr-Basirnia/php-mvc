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

function view($path)
{
    $path = str_replace('.', '/', $path);
    include_once realpath(BASEPATH . '/views/' . $path . '.php');
}
