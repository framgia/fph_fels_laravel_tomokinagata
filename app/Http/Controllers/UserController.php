<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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
}
