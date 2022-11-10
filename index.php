<?php

use App\Core\Request;

// framework initiation file
require 'bootstrap/bootstrap.php';


//$router = new StupidRouter();
//$router->run();

$request = new Request();
var_dump($request->get_ip(), $request->input('name'), $request->isset('name'));
