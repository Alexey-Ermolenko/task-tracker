<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Project;
use App\Models\ProjectTask;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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

        $task_array = [];
        $company = null;
        $project = null;

        $companyId = $request->get('company_id');
        if ($companyId) {
            $company_task_ids = Company::find($companyId)->tasks->pluck('id')->toArray();
            $company = Company::find($companyId);

            $projectTasks->whereIn('id', $company_task_ids);
        }

        $projectId = $request->get('project_id');
        if ($projectId) {
            $project_task_ids = Project::find($companyId)->tasks->pluck('id')->toArray();
            $project = Project::find($projectId);

            $projectTasks->whereIn('id', $project_task_ids);
        }

        $task_array = $projectTasks->get();

        return view('task.list', compact('task_array', 'company', 'project', 'authUser'));
    }

    /**
     * @param string $taskCode
     * @return Renderable
     */
    public function taskView(string $taskCode): Renderable
    {
        $projectTask = null;
        $authUser = Auth::user();

        $assignedTaskIds = $authUser->assigned_tasks()->pluck('id')->toArray();
        $followerTaskIds = $authUser->follower_tasks()->pluck('id')->toArray();
        $companyTaskIds = [];

        $companyId = Session::get('company_id');
        if ($companyId) {
            $companyTaskIds = Company::find($companyId)->tasks->pluck('id')->toArray();
        }

        $userProjectTaskIds = array_unique(array_merge($assignedTaskIds, $followerTaskIds, $companyTaskIds));

        if ($userProjectTaskIds) {
            $projectTask = ProjectTask::where('code', $taskCode)
                ->whereIn('id', $userProjectTaskIds)
                ->get();
        }

        if ($projectTask[0]) {
            $projectTask = $projectTask[0];
        }

        $projectStageList = $projectTask->project()?->get()[0]?->task_stages()->get()?->toArray();
        //$projectStage['id'] === $projectTask->stage_id

        return view('task.view' , compact('projectTask', 'projectStageList', 'authUser'));
    }


    public function taskUpdate(Request $request)
    {
        return 1;
    }

    public function likes(Request $request)
    {
        $data = $request->post();

        $isLiked = $data['isLiked'];

        $taskId = $data['task']['id'];
        $userId = $data['user']['id'];

        $model = ProjectTask::find($taskId);
        $likes = json_decode($model->likes);

        if ($isLiked === 'true') {
            $likes[] = (int)$userId;
        } else {
            $key = array_search((int)$userId, $likes); // Ищем индекс значения 2 в массиве
            if ($key !== false) {
                array_splice($likes, $key, 1);
            }
        }

        $model->likes = $likes;
        $model->save();

        return 1;
    }
}
