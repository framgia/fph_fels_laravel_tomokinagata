<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        return view('userList', ['profile_users' => User::paginate(12), 'user' => Auth::user()]);
    }

    public function profile(User $profile_user)
    {
        if ($profile_user->id == Auth::id()) {
            return redirect ('/dashboard');
        }

        return view('profile', [
            'user' => Auth::user(),
            'profile_user' => $profile_user,
            'count_words_learned' => $profile_user->countWordsLearned(),
            'relation' => Auth::user()->relation($profile_user)
        ]);
    }

    public function profileWordsLearned(User $profile_user)
    {
        $words_learned = $profile_user->wordsLearned();
        return view('profileWordsLearned', [
            'user' => Auth::user(),
            'profile_user' => $profile_user,
            'words' => $words_learned['words'],
            'word_answers' => $words_learned['word_answers'],
            'count_words_learned' => $profile_user->countWordsLearned(),
            'relation' => Auth::user()->relation($profile_user)
        ]);
    }

    public function profileFollowers(User $profile_user)
    {
        return view('profileFollowers', [
            'user' => Auth::user(),
            'profile_user' => $profile_user,
            'count_words_learned' => $profile_user->countWordsLearned(),
            'relation' => Auth::user()->relation($profile_user),
            'followers' => $profile_user->getFollowers()
        ]);
    }

    public function profileFollowing(User $profile_user)
    {
        return view('profileFollowing', [
            'user' => Auth::user(),
            'profile_user' => $profile_user,
            'count_words_learned' => $profile_user->countWordsLearned(),
            'relation' => Auth::user()->relation($profile_user),
            'followings' => $profile_user->getFollowings()
        ]);
    }
}
