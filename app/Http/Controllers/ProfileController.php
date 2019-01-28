<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile(User $profile_user)
    {
        $count_words_learned = $profile_user->countWordsLearned();
        $relation = Auth::user()->relation($profile_user);
        return view('profile', [
            'user' => Auth::user(),
            'profile_user' => $profile_user,
            'count_words_learned' => $count_words_learned,
            'relation' => $relation
        ]);
    }

    public function profileWordsLearned(User $profile_user)
    {
        $words_learned = $profile_user->wordsLearned();
        $count_words_learned = $profile_user->countWordsLearned();
        $relation = Auth::user()->relation($profile_user);
        return view('profileWordsLearned', [
            'user' => Auth::user(),
            'profile_user' => $profile_user,
            'words' => $words_learned['words'],
            'word_answers' => $words_learned['word_answers'],
            'count_words_learned' => $count_words_learned,
            'relation' => $relation
        ]);
    }

    public function profileFollowers(User $profile_user)
    {
        $followers = $profile_user->getFollowers();
        $count_words_learned = $profile_user->countWordsLearned();
        $relation = Auth::user()->relation($profile_user);
        return view('profileFollowers', [
            'user' => Auth::user(),
            'profile_user' => $profile_user,
            'count_words_learned' => $count_words_learned,
            'relation' => $relation,
            'followers' => $followers
        ]);
    }

    public function profileFollowing(User $profile_user)
    {
        $followings = $profile_user->getFollowings();
        $count_words_learned = $profile_user->countWordsLearned();
        $relation = Auth::user()->relation($profile_user);
        return view('profileFollowing', [
            'user' => Auth::user(),
            'profile_user' => $profile_user,
            'count_words_learned' => $count_words_learned,
            'relation' => $relation,
            'followings' => $followings
        ]);
    }
}
