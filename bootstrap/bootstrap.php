<?php

use App\Core\Request;

define('BASEPATH', realpath(__DIR__ . '/../'));

// init composer autoloader
require BASEPATH . '/vendor/autoload.php';


// use dotenv package
$dotenv = Dotenv\Dotenv::createImmutable(BASEPATH);
$dotenv->load();

// global request variable
$request = new Request();

// helpers
include BASEPATH . '/helpers/helpers.php';

// route lists
include BASEPATH . '/routes/web.php';