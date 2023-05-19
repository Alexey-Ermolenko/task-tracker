<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class ActivityLogController extends Controller
{
    /**
     * Show the application activity log.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {

        return view('activitylog.index');
    }
}
