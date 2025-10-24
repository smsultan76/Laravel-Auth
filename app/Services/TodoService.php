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

    public function getOne($id){
        return Todo::findOrFail($id);
    }

    public function createTodo($data){
        return Todo::create($data);
    }

    public function deleteTodo($id){
        return Todo::destroy($id);
    }
}
