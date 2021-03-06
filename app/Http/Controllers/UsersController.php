<?php

namespace App\Http\Controllers;

use App\Http\Requests\users\UpdateProfileRequest;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        return view('users.index')->with('users', User::all());
    }

    public function edit()
    {
        return view('users.edit')->with('user', auth()->user());
    }

    public function update(UpdateProfileRequest $request)
    {
        $user = auth()->user();

        $user->update([
            'name' => $request->name,
            'about' => $request->about
        ]);

        session()->flash('success', 'Profile Updated Successfully');
        return redirect()->back();
    }

    // public function makeAdmin(User $user)
    // {
    //     return $user->role == 'admin';
    //     $user->save();

    //     session()->flash('success', 'User has been made admin Successfully');
    //     return redirect(route('users.index'));
    // }
}
