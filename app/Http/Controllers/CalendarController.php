<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @param string|null $task_by
     * @param int|null $project_id
     * @return Renderable
     */
    public function index(string $task_by = null, int $project_id = NULL): Renderable
    {
        //$task_by all|my
        //$project_id = 1;
        $arrTasks = [];

        return view('calendar.index', compact('arrTasks', 'project_id', 'task_by'));
    }
}
