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
        $user = Auth::user();
        $companyIds = $user->companies()->pluck('company_id')->toArray();
        $companyIdsCreatedByUserId = Company::where('created_by', $user->id)->pluck('id')->toArray();

        $totalIds = array_merge($companyIds, $companyIdsCreatedByUserId);

        $userCompanies = Company::whereIn('id', array_values($totalIds))->get();

        return view('company.index', compact('userCompanies'));
    }

    /**
     * @param int $id
     * @return Renderable
     */
    public function view(int $id): Renderable
    {
        Session::remove('company_id');
        Session::remove('company_name');

        $company = Company::find($id);

        if ($company) {
            Session::put('company_id', $company->id);
            Session::put('company_name', $company->name);

            return view('company.view', compact('company'));
        }

        return view('errors.404');
    }
}
