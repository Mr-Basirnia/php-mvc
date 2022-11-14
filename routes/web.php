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


Route::get('/home/{slug}', function () {
    global $request;
    var_dump($request->get_route_params('slug'));
});

Route::get('/home/{slug}/comment/{id}', function () {
    global $request;
    var_dump($request->get_route_params('slug'));
    var_dump($request->get_route_params('id'));
});