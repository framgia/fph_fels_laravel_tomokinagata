<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.userList')->with('users',  User::orderBy('id', 'DESC')->paginate(20));
    }

    public function delete(User $user)
    {
        $user->delete();
        return redirect()->action('UserController@index')->with('Success', 'The user is deleted successfully.');
    }

    public function edit(){
        return view('profileEdit', ['user' => Auth::user()]);
    }

    public function update(ProfileRequest $request)
    {
        $avatar = $request->avatar != NULL ? $request->avatar->storeAs('public/profile_images', Auth::id() . '.jpg') : '';
        $user = Auth::user();
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'avatar' => $avatar
        ]);
        return redirect('dashboard')->with('Success', 'Your account is updated successfully');
    }

}
