<?php

define('BASEPATH', realpath(__DIR__ . '/../'));

// init composer autoloader
require BASEPATH . '/vendor/autoload.php';


// use dotenv package
$dotenv = Dotenv\Dotenv::createImmutable(BASEPATH);
$dotenv->load();
