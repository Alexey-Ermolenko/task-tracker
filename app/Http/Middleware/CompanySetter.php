<?php

namespace App\Http\Middleware;

use App\Models\Company;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CompanySetter
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $companyId = Session::get('company_id');

        if (!$companyId) {
            $companyId = $request->get('company_id');
            if (!$companyId) {
                $parts = explode('/', $request->path());
                if (count($parts) >= 2 && (int)$parts[1]) {
                    $companyId = $parts[1];
                } else {
                    return $next($request);
                }
            }

            if ($companyId) {
                $company = Company::find($companyId);

                if ($company) {
                    Session::put('company_id', $company->id);
                    Session::put('company_name', $company->name);
                } else {
                    return redirect()->route('companies');
                }
            }
        }

        return $next($request);
    }
}
