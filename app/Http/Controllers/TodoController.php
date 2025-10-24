<?php

namespace App\Http\Controllers;

use App\Services\TodoService;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    protected $todoService;

    public function __construct(TodoService $todoService)
    {
        $this->todoService = $todoService;
    }

    public function index(){
        $todos = $this->todoService->getTodos();
        return response()->json($todos);
    }

    
    public function store(Request $request){
        $request->validate([
            'task' => 'required|string|max:100',
            'description' => 'nullable|string',
            'status' => 'nullable|string|in:pending,completed,in-progress,cancelled',
        ]);

        $task = $this->todoService->createTodo($request->all());
        return response($task, 201);
    }
}
