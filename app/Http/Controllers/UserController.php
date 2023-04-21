<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Project;
use App\Models\ProjectTask;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Renderable
     */
    public function index(Request $request): Renderable
    {
        $authUser = Auth::user();

        $session_company_id = Session::get('company_id');

        $users = User::where('id', '!=', $authUser->id);
        $company = null;
        $project = null;
        $task = null;

        if ($request->has('company_id')) {
            $users_ids = Company::find($request->company_id)->users->pluck('id')->toArray();
            $company = Company::find($request->company_id);

            $users->whereIn('id', $users_ids);
        }

        if ($request->has('project_id')) {
            $users_ids = Project::find($request->project_id)->users->pluck('id')->toArray();
            $project = Project::find($request->project_id);

            $users->whereIn('id', $users_ids);
        }

        if ($request->has('task_id')) {
            $users_ids = ProjectTask::find($request->task_id)->users->pluck('id')->toArray();
            $task = ProjectTask::find($request->task_id);

            $users->whereIn('id', $users_ids);
        }

        $array = [
            'company' => $company,
            'project' => $project,
            'task' => $task,
            'users' => $users->get()
        ];

        return view('users.index', compact('array'));
    }

    public function view(int $id): Renderable
    {
        return view('users.view', compact('id'));
    }

    public function profile()
    {
        $user = Auth::user();

        return view('users.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $objUser  = Auth::user();
        $validate = [];

        if($request->from == 'profile')
        {
            $validate = [
                'name' => 'required|max:120',
                'email' => 'required|email|unique:users,email,' . $objUser->id,
                'dob' => 'required',
                'gender' => 'required',
                'phone' => 'required|numeric',
            ];
        }
        elseif($request->from == 'password')
        {
            $validate = [
                'old_password' => 'required',
                'password' => 'required|min:8|same:password',
                'password_confirmation' => 'required|min:8|same:password',
            ];
        }

        if(isset($request->avatar) && !empty($request->avatar))
        {
            $validate = [
                'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ];
        }

        if(isset($request->whatsapp) && !empty($request->whatsapp))
        {
            $validate['whatsapp'] = 'required|numeric';
        }

        $validator = Validator::make(
            $request->all(), $validate
        );

        if($validator->fails())
        {
            return redirect()->back()->with('error', $validator->errors()->first());
        }

        $post = $request->all();

        // Image Uploading
        if($request->avatar)
        {
            Utility::checkFileExistsnDelete([$objUser->avatar]);
            $avatarName = $objUser->id . '_avatar' . time() . '.' . $request->avatar->getClientOriginalExtension();
            $request->avatar->storeAs('avatars', $avatarName);
            $post['avatar'] = 'avatars/' . $avatarName;
        }

        // Password Confirmation
        if($request->from == 'password')
        {
            $current_password = $objUser->password;
            if(!Hash::check($post['old_password'], $current_password))
            {
                return redirect()->back()->with('error', __('Please Enter Correct Current Password!'));
            }
            else
            {
                $post['password'] = Hash::make($request->password);
            }
        }

        $objUser->update($post);

        if($request->avatar)
        {
            return redirect()->back()->with('success', __('Avatar Updated Successfully!'));
        }
        else if($request->from == 'profile')
        {
            return redirect()->back()->with('success', __('Profile Updated Successfully!'));
        }
        else if($request->from == 'password')
        {
            return redirect()->back()->with('success', __('Password Updated Successfully!'));
        }
    }

    public function userInfo($id)
    {
        $user = User::find($id);

        return view('users.info', compact('user'));
    }
}
