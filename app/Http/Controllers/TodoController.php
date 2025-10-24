<?php

namespace App\Http\Controllers;

use App\Services\TodoService;
use App\Services\TodoUpdateService;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    protected $todoService;
    protected $todoUpdateService;

    public function __construct(TodoService $todoService, TodoUpdateService $todoUpdateService)
    {
        $this->todoService = $todoService;
        $this->todoUpdateService = $todoUpdateService;
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

    public function update(Request $request, $id){
        $request->validate([
            'task' => 'sometimes|required|string|max:100',
            'description' => 'sometimes|nullable|string',
            'status' => 'sometimes|nullable|string|in:pending,completed,in-progress,cancelled',
        ]);
        $task = $this->todoUpdateService->updateTodo($id, $request->all());
        return response()->json($task);
    }
    
}
