<?php

namespace App\Services;

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
        return [
            ['id' => 1, 'task' => 'Buy groceries', 'completed' => false],
            ['id' => 2, 'task' => 'Clean the house', 'completed' => true],
            ['id' => 3, 'task' => 'Finish the project', 'completed' => false],
        ];
    }
}
