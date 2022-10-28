<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($view = 'grid')
    {

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
