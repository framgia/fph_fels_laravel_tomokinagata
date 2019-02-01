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
        return view('admin.wordList')->with([
            'words' => $category->words,
            'category' => $category
        ]);
    }

    public function add(Category $category)
    {
        return view('admin.addWord')->with('category_id', $category->id);
    }

    public function create(Request $request)
    {
        //Creating the word.
        $word = new Word;
        $word->createWord($request);

        //Creating the answers for the word.
        for($count=1; $count<=5; $count++) {
            $correct = $request->check == $count ? 1 : 0;
            $word->wordAnswers()->create([
                'content' => $request->$count,
                'correct' => $correct
            ]);
        }
        return redirect()->action('WordController@index', ['category' => Category::find($request->category_id)])->with('Success', 'The word is created successfully.');
    }
    
    public function edit(Word $word)
    {
        return view('admin.editWord')->with([
            'word' => $word,
            'word_answers' => $word->wordAnswers 
        ]);
    }

    public function update(Request $request)
    {
        for($count=1; $count<=5; $count++) {
            $idProperty = 'id'. strval($count);
            $correct = $request->check == $count ? 1 : 0;    
            $word_answer = WordAnswer::find($request->$idProperty)->update([
                'content' => $request->$count, 
                'correct' => $correct
            ]);
        }
        return redirect()->action('WordController@index', ['category' => Category::find($request->categoryId)])->with('Success', 'The word is updated successfully.');
    }

    public function delete(Word $word)
    {   
        $word->delete();
        return back()->with('Success', 'The word is deleted successfully.');
    }

}
