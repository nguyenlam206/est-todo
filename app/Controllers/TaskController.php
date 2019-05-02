<?php

namespace App\Controllers;

use App\Models\Task;

class TaskController
{
    protected $task;

    public function __construct()
    {
        $this->task = new Task;
    }

    public function index()
    {
        include APP_PATH . 'Views/tasks/index.php';
    }

    public function create()
    {
        return $this->task->create($_POST);
    }

    public function update($id)
    {
        return $this->task->update($_POST, $id);
    }

    public function delete($id)
    {
        return $this->task->delete($id);
    }

    public function detail($id)
    {
        $task = $this->task->find($id);

        include APP_PATH . 'Views/tasks/detail.php';
    }
}