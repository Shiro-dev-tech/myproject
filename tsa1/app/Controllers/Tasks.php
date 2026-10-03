<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Tasks extends BaseController
{
    public function today()
    {
        $taskModel = new TaskModel();

        $today = date('Y-m-d');

        $tasks = $taskModel
            ->where('task_date', $today)
            ->findAll();

        return view('welcome', ['tasks' => $tasks]);
    }

    public function index()
    {
        $taskModel = new TaskModel();

        $tasks = $taskModel
            ->orderBy('task_date', 'ASC')
            ->findAll();

        return view('tasks', ['tasks' => $tasks]);
    }
}