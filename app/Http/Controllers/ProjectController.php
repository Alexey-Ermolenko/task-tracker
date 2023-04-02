<?php

namespace App\Http\Controllers;

use App\Models\Company;
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
     * @param int $companyId
     * @return Renderable
     */
    public function index(int $companyId): Renderable
    {
        $user = Auth::user();

        $userProjects = $user->projects()->get();
        $projectIds = $user->projects()->pluck('project_id')->toArray();

        $companyProjects = Project::whereIn('id', array_values($projectIds))
            ->where('company_id', $companyId)
            ->orderBy('id', 'asc')
            ->paginate(10);

        $companyProjectsCompletedCount = 33;
        $companyProjectsPending = 54;

        /*if ($companyId) {
            $companyProjects->where('company_id', $companyId);
        }

        $companyProjects->orderBy('id', 'asc')->paginate(10);

        $companyProjectsCompletedCount = Project::whereIn('id', array_values($projectIds))
            ->whereIn('status', [Project::COMPLETE, Project::CANCELED])
            ->count();
        $companyProjectsPending = Project::whereIn('id', array_values($projectIds))
            ->whereIn('status', [Project::ON_HOLD, Project::IN_PROGRESS])
            ->count();
*/
        return view('project.index', compact(
            'companyProjects',
            'userProjects',
            'companyProjectsCompletedCount',
            'companyProjectsPending',
            'companyId'
        ));
    }

    /**
     * @param int $companyId
     * @param int $projectId
     * @return Renderable
     */
    public function view(int $companyId, int $projectId): Renderable {
        $company = Company::find($companyId);
        $project = Project::find($projectId);

        return view('project.view', compact('project', 'company'));
    }

    public function edit(int $companyId, int $projectId) {

    }
}
