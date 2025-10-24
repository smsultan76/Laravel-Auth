<?php

namespace App\Services;

use App\Models\Todo;

class TodoUpdateService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    public function updateTodo($id, $data){
        $todo = Todo::findOrFail($id);
        $todo->update($data);
        return $todo;
    }
}
