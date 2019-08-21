<?php

namespace App\Http\Controllers\Admin;

use App\Franchise;
use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Alert;
use File;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        if (session('status'))
        {
            Alert::success('Success', session('status'));
        }
        return view('admin.users.index', ['users' => $model->paginate(10)]);
    }

    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request, User $model)
    {
        $model->create($request->merge(['password' => Hash::make($request->get('password'))])->all());
        return redirect()->route('user.index')->withStatus(__('User successfully created.'));
    }

    /**
     * Show the form for editing the specified user
     *
     * @param  \App\User  $user
     * @return \Illuminate\View\View
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, User  $user)
    {
        $user->update(
            $request->merge(['password' => Hash::make($request->get('password'))])
                ->except([$request->get('password') ? '' : 'password']
        ));

        return redirect()->route('user.index')->withStatus(__('User successfully updated.'));
    }

    /**
     * Remove the specified user from storage
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User  $user)
    {
        if ($user->avatar != 'default.png')
        {
            $userImage = public_path('uploads\avatar\\'.$user->avatar);
                if(file_exists($userImage))
                {
                    File::delete($userImage);
                }
        }
        
        $user->delete();

        return redirect()->route('user.index')->withStatus(__('User successfully deleted.'));
    }


    //search
    public function search(Request $request)
    {
        $search = $request->get('search');
        
        $users = User::whereRaw('LOWER(`name`) LIKE ?', '%'.trim(strtolower($search)).'%')
                    ->orWhereRaw('LOWER(`email`) LIKE ?','%'.trim(strtolower($search)).'%')
                    ->orWhereRaw('LOWER(`role`) LIKE ?','%'.trim(strtolower($search)).'%')
                    ->paginate(10);
        
        return view('admin.users.index',['users'=> $users]);
    }
}
