<?php


// framework initiation file
require 'bootstrap/bootstrap.php';


global $request;

//$router = new Router($request);
//$router->run();

$route_pattern = '/^\/post\/(?<slug>[-%\w]+)$/';

$url1 = '/post/test';

var_dump(preg_match($route_pattern, $url1));