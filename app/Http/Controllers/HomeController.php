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
        $learned_words  = 0;
        foreach ($user->lessons()->get() as $lesson){
            $learned_words = ($learned_words !== 0) ? count($lesson->lessonWords()->get()) + $learned_words : count($lesson->lessonWords()->get());
        }
        return view('dashboard', ['user' => $user, 'learned_words' => $learned_words]);
    }

    public function wordsLearned()
    {
        $lessons = Auth::user()->lessons()->get();
        $words = [];
        $word_answers = [];

        foreach ($lessons as $lesson) {
            $lesson_words = LessonWord::where('lesson_id', $lesson->id)->get();
                foreach ($lesson_words as $lesson_word) {
                    array_push($words, Word::find($lesson_word->word_id)->content);
                    array_push($word_answers, WordAnswer::find($lesson_word->word_answer_id)->content);
                } 
        }   
        return view('wordsLearned', [
            'user' => Auth::user(),
            'words' => $words,
            'word_answers' => $word_answers
            ]);
    }
}
