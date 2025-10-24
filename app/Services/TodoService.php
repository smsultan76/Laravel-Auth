<?php

namespace App\Services;

use App\Models\Todo;

class TodoService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    public function getTodos()
    {
        // return "Hello from TodoService!";
        return Todo::all();
    }

    public function createTodo($data){
        return Todo::create($data);
    }
}
