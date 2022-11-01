<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @return Renderable
     */
    public function index(Request $request): Renderable
    {
        $companyId = $request->session()->get('company_id');
        $user = Auth::user();

        $userProjects = $user->projects()->get();

        $projectId = $user->projects()->pluck('project_id')->toArray();
        $companyProjects = Project::whereIn('id', array_values($projectId));

        if ($companyId) {
            $companyProjects->where('company_id', $companyId);
        }

        $companyProjectsCompletedCount = Project::whereIn('id', array_values($projectId))
            ->whereIn('status', ['complete', 'canceled'])
            ->count();
        $companyProjectsPending = Project::whereIn('id', array_values($projectId))
            ->whereIn('status', ['on_hold', 'in_progress'])
            ->count();

        $companyProjects = $companyProjects->get();

        return view('project.index', compact('companyProjects', 'userProjects', 'companyProjectsCompletedCount', 'companyProjectsPending'));
    }

    /**
     * @param int $id
     * @return Renderable
     */
    public function view(int $id): Renderable {
        $project = Project::find($id);

        return view('project.view', compact('project'));
    }

    public function edit() {

    }
}
