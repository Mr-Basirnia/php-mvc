<?php

use App\Core\Routing\Route;

Route::get('/', 'HomeController@index');


Route::get('/book/add', function () {
    echo 'Hello World';
});
