<?php

use App\Core\Routing\Route;
use App\Middlewares\{BlockFirefox, BlockIE};

Route::get('/', 'HomeController@index', [BlockFirefox::class, BlockIE::class]);

Route::get('/blog', ['BlogController', 'index']);
Route::get('/blog/book', ['BlogController', 'book']);

Route::get('/book/add', function () {
    echo 'Hello World';
});


Route::get('/todo', 'TodoController@index');