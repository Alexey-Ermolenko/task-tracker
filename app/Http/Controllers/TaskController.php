<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Show the kanban task dashboard.
     *
     * @param $companyId
     * @param $projectId
     * @return Renderable
     */
    public function taskKanban($companyId, $projectId): Renderable
    {
        $project = Project::find($projectId);

        return view('task.kanban', compact('companyId', 'project'));
    }

    /**
     * Show the task list.
     *
     * @param $companyId
     * @param $projectId
     * @return Renderable
     */
    public function taskList($companyId, $projectId): Renderable
    {
        $project = Project::find($projectId);

        return view('task.list', compact('companyId', 'project'));
    }
}
