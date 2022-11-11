<?php

use App\Core\Routing\Route;
use App\Middlewares\{BlockChrome, BlockFirefox, BlockIE};

Route::get('/', 'HomeController@index', [
    BlockIE::class,
    BlockFirefox::class
]);

Route::get('/blog', ['BlogController', 'index'], [
    BlockChrome::class
]);

Route::get('/blog/book', ['BlogController', 'book']);

Route::get('/book/add', function () {
    echo 'Hello World';
});


Route::get('/todo', 'TodoController@index', [
    BlockIE::class
]);