<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @param $companyId
     * @param $projectId
     * @return Renderable
     */
    public function index($companyId, $projectId): Renderable
    {
        $project = Project::find($projectId);

        return view('task.index', compact('companyId', 'project'));
    }
}
