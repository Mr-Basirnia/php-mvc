<?php


// framework initiation file
require 'bootstrap/bootstrap.php';


global $request;

//$router = new Router($request);
//$router->run();

$route_pattern = '/^\/post\/(?<slug>[-%\w]+)$/';
$route = '/post/{slug}';
$pattern = '/^' . str_replace(
        ['/', '{', '}'],
        ['\/', '(?<', '>[-%\w]+)'],
        $route
    ) . '$/';

echo($route_pattern . '<br>');
echo($pattern . '<br>');