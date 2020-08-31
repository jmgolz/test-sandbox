<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TasksController extends Controller
{
    public function getAll()
    {
        //return "it works!";
        $tasks = DB::select('select * from task');
        return $tasks;
    }
}
