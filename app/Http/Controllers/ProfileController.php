<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    protected $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->middleware('auth');
        $this->imageService = $imageService;
    }

    public function edit()
    {
        $user = Auth::user();
        return view('user.update')->withUser($user);
    }

    public function showPasswordForm()
    {
        $user = Auth::user();
        return view('user.changepassword')->withUser($user);
    }

    public function update(UpdateProfileRequest $request)
    {
        $user = Auth::user();
        
        if ($request->hasFile('userpic')) {
            $user->userpic = $this->imageService->upload(
                $request->file('userpic'), 
                'userpic', 
                300, 300, 
                $user->userpic
            );
        }

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->address = $request->input('address');
        $user->phonenumber = $request->input('phonenumber');
        $user->save();

        session()->flash('notif', 'Profile Updated Successfully!');
        return redirect()->back();
    }

    public function updatePassword(ChangePasswordRequest $request)
    {
        $user = Auth::user();

        if (!Hash::check($request->input('oldpassword'), $user->password)) {
            session()->flash('notif', 'Old Password does not match.');
            return redirect()->back();
        }

        $user->password = Hash::make($request->input('newpassword'));
        $user->save();

        session()->flash('notif', 'Password Changed Successfully');
        return redirect()->back();
    }
}
