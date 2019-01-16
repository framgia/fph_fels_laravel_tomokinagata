<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Word;
use App\WordAnswer;
use App\Category;

class WordController extends Controller
{
    public function index(Category $category)
    {
        $word = new Word;
        $words = $word->findWords($category);
        $answer = new WordAnswer;
        $answers = $answer->correctAnswers();
        return view('admin.wordList')->with([
            'words' => $words,
            'answers' => $answers,
            'category' => $category
        ]);
    }

    public function add(Category $category)
    {
        $category_id = $category->id;
        return view('admin.addWord')->with('category_id', $category_id);
    }

    public function create(Request $request)
    {
        //Creating the word.
        $word = new Word;
        $word->create($request);

        //Creating the answers for the word.
        $word = new Word;
        $word_id = $word->getLatestId();
        for($i=1; $i<=5; $i++) {
            $choicex = "choice". $i;
            $correct = $request->check === $choicex ? 1 : 0;
            $word_answer = new WordAnswer;
            $word_answer->create($word_id, $request->$choicex, $correct);
        }
        
        $category = Category::find($request->category_id);
        return redirect()->action('WordController@index', ['category' => $category])->with('Success', 'The word is created successfully.');
    }
    
    public function edit(Word $word)
    {
        $word_answer = new WordAnswer;
        $word_answers = $word_answer->findAnswers($word);
        return view('admin.editWord')->with([
            'word' => $word,
            'word_answers' => $word_answers 
        ]);
    }

    public function update(Request $request)
    {
        for($i=1; $i<=5; $i++) {
            $choicex = "choice". $i;
            $answerIdx = "answerId". $i;
            $correct = $request->check === $choicex ? 1 : 0;     
            $word_answer = WordAnswer::find($request->$answerIdx);
            $word_answer->updateAnswer($request->$choicex, $correct);
        }

        $category = Category::find($request->categoryId);
        return redirect()->action('WordController@index', ['category' => $category])->with('Success', 'The word is updated successfully.');
    }

    public function delete(Word $word)
    {   
        $word->delete();
        return back()->with('Success', 'The word is deleted successfully.');
    }
}
