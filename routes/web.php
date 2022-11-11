<?php

use App\Core\Routing\Route;

Route::get('/', 'HomeController@index');

Route::get('/blog', ['BlogController', 'index']);
Route::get('/blog/book', ['BlogController', 'book']);

Route::get('/book/add', function () {
    echo 'Hello World';
});


Route::get('/todo' , 'TodoController@index');