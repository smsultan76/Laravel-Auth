<?php

namespace App\Http\Controllers;

use App\Services\TodoService;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function __construct(TodoService $todoService)
    {
        $this->$todoService = $todoService;
    }
}
