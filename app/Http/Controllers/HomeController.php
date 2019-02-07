<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lesson;
use App\LessonWord;
use App\Word;
use App\WordAnswer;
use App\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }

    public function dashboard()
    {
        return view('dashboard', [
            'user' => Auth::user(),
            'count_words_learned' => Auth::user()->countWordsLearned()
        ]);
    }

    public function wordsLearned()
    {
        $words_learned = Auth::user()->wordsLearned();
        return view('wordsLearned', [
            'user' => Auth::user(),
            'count_words_learned' => Auth::user()->countWordsLearned(),
            'words' => $words_learned['words'],
            'word_answers' => $words_learned['word_answers']
        ]);
    }

    public function followers()
    {
        return view('dashboardFollowers', [
            'user' => Auth::user(),
            'count_words_learned' => Auth::user()->countWordsLearned(),
            'followers' => Auth::user()->getFollowers()
            ]);
    }

    public function following()
    {
        return view('dashboardFollowing', [
            'user' => Auth::user(),
            'count_words_learned' => Auth::user()->countWordsLearned(),
            'followings' => Auth::user()->getFollowings()
            ]);
    }
}
