<?php

namespace App\Controllers;

class BlogController
{
    public function index()
    {
        view('blogs.index');
    }

    public function book()
    {
        view('blogs.book');
    }
}