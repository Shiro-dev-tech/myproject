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
            ->where('is_archived', 0)
            ->findAll();

        return view('welcome', ['tasks' => $tasks]);
    }

    public function index()
    {
        $taskModel = new TaskModel();

        $tasks = $taskModel
            ->where('is_archived', 0)
            ->orderBy('task_date', 'ASC')
            ->findAll();

        return view('tasks', ['tasks' => $tasks]);
    }

    public function new()
    {
        return view('tasks_new');
    }

    public function create()
    {
        $rules = [
            'title'     => 'required',
            'task_date' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $taskModel = new TaskModel();

        $taskModel->insert([
            'title'       => $this->request->getPost('title'),
            'status'      => $this->request->getPost('status'),
            'task_date'   => $this->request->getPost('task_date'),
            'created_at'  => date('Y-m-d H:i:s'),
            'is_archived' => 0,
        ]);

        return redirect()->to(site_url('tasks'));
    }

    public function edit($id)
    {
        $taskModel = new TaskModel();

        $task = $taskModel->find($id);

        return view('tasks_edit', ['task' => $task]);
    }

    public function update($id)
    {
        $rules = [
            'title'     => 'required',
            'task_date' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $taskModel = new TaskModel();

        $taskModel->update($id, [
            'title'     => $this->request->getPost('title'),
            'status'    => $this->request->getPost('status'),
            'task_date' => $this->request->getPost('task_date'),
        ]);

        return redirect()->to(site_url('tasks'));
    }

    public function archive($id)
    {
        $taskModel = new TaskModel();

        $taskModel->update($id, [
            'is_archived' => 1,
        ]);

        return redirect()->to(site_url('tasks'));
    }
}