<?php

use App\Utilities\Url;


// framework initiation file
require 'bootstrap/bootstrap.php';


$route = Url::current_route();

if ($route == '/red')
    include BASEPATH . '/views/colors/red.php';
if ($route == '/green')
    include BASEPATH . '/views/colors/green.php';
if ($route == '/blue')
    include BASEPATH . '/views/colors/blue.php';
