<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

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
        $companyName = $request->session()->get('company_name');

        /* TODO projects */

        return view('project.index');
    }
}
