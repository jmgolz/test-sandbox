<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Task;

class TasksController extends Controller
{
    public function getAll()
    {
        $tasks = Task::all();
        return response()->json($tasks);
    }

    public function deleteTask($id)
    {
        // $task = Task::find($id);
        // $task->delete();

        return response()->json(['id' => $id]);
    }

    public function createTask(Request $request)
    {

    }
}
