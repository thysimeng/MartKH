<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Auth;
use Image;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        return view('admin.profile.edit');
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    {
        auth()->user()->update($request->all());

        return back()->withStatus(__('Profile successfully updated.'));
    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus(__('Password successfully updated.'));
    }

    public function upload(Request $request)
    {
        if($request->hasFile('avatar'))
        {
            $avatar = $request->file('avatar');
            $fileName = time().'.'.$avatar->getClientOriginalExtension();
        Image::make($avatar)->resize(400,400)->save( public_path('uploads\avatar\\'.$fileName));

            $user = Auth::user();
            $user->avatar = $fileName;
            $user->save();

            return back()->withStatus(__('Profile picture successfully updated.'));
        }
    }
}
