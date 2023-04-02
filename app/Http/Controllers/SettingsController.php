<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Role;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        if(Auth::user()->isAdmin()) {


            return view('settings.admin_settings');
        } else {


            return view('settings.user_settings');
        }

        /*if(Auth::user()->role == 'admin')
        {
            $timezones = config('timezones');
            $settings  = Utility::settings();
            return view('settings.index', compact('timezones','settings'));
        }
        else
        {
            $details        = Auth::user()->decodeDetails();
            $payment_detail = Utility::getPaymentSetting(Auth::user()->id);
            $settings  = Utility::settings();

            return view('users.owner_setting', compact('details', 'payment_detail','settings'));
        }*/
    }
}
