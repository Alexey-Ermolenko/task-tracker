<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Project;
use App\Models\ProjectTask;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $company = Company::find($companyId);
        $project = Project::find($projectId);

        return view('task.kanban', compact('companyId', 'project'));
    }

    /**
     * Show the task list.
     *
     * @param Request $request
     * @return Renderable
     */
    public function taskList(Request $request): Renderable
    {
        $authUser = Auth::user();

        $projectTasks = ProjectTask::whereRaw('1=1');
        $assignedTasksIds = $authUser->assigned_tasks()->pluck('id');
        $followerTasksIds = $authUser->follower_tasks()->pluck('id');

        $companyId = $request->get('company_id');
        if ($companyId) {
            $company_ids = Company::find($companyId)->tasks->pluck('id')->toArray();
            $company = Company::find($companyId);
        }

        $projectId = $request->get('project_id');
        if ($projectId) {
            $project_ids = Project::find($companyId)->tasks->pluck('id')->toArray();
            $project = Project::find($projectId);
        }


        return view('task.list');
    }
}
