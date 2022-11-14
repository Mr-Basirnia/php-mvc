<?php

use App\Core\Routing\Router;

// framework initiation file
require 'bootstrap/bootstrap.php';


global $request;

$router = new Router($request);
$router->run();