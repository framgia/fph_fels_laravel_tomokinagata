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
        $user = Auth::user();
        $learned_words = $user->countWordsLearned(); 
        return view('dashboard', ['user' => $user, 'learned_words' => $learned_words]);
    }

    public function wordsLearned()
    {
        $words_learned = Auth::user()->wordsLearned();
        return view('wordsLearned', [
            'user' => Auth::user(),
            'words' => $words_learned['words'],
            'word_answers' => $words_learned['word_answers']
        ]);
    }
}
