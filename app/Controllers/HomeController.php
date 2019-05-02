<?php

namespace App\Controllers;

use App\Models\Task;

class HomeController
{
    protected $task;

    public function __construct()
    {
        $this->task = new Task;
    }

    public function index()
    {
        $tasks = $this->task->all();

        include APP_PATH . 'Views/home/index.php';
    }
}