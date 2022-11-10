<?php

use App\Core\Routing\Router;



// framework initiation file
require 'bootstrap/bootstrap.php';

$router = new Router($request);
$router->run();
