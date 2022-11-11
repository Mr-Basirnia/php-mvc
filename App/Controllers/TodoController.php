<?php

namespace App\Controllers;

class TodoController
{
    public function index()
    {
        $data = [
            'title' => 'لیست تسک ها',
            'tasks' => ['one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight']
        ];

        view('todo.list', $data);
    }
}