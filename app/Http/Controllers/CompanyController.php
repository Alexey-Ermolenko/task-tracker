<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CompanyController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        $userCompanies = Auth::user()->companies()->get();

        return view('company.index', compact('userCompanies'));
    }

    /**
     * @param int $id
     * @return Renderable
     */
    public function view(int $id): Renderable
    {
        $company = Company::find($id);

        Session::put('company_id', $company->id);
        Session::put('company_name', $company->name);

        return view('company.view', compact('company'));
    }
}
