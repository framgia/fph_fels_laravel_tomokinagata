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
        for ($counter1=1; $counter1<=$request->number; $counter1++) {
            //Creating a word.
            $property_of_word = 'word'. $counter1;
            $word = new Word;
            $word = $word->create([
                'category_id' => $request->category_id,
                'content' => $request->$property_of_word
            ]);

            //Creating answers for the word.
            for ($counter2=1; $counter2<=5; $counter2++) {
                $property_of_answer = $counter2+5*($counter1-1);
                $property_of_check = 'check'. $counter1;
                $correct = $request->$property_of_check == $property_of_answer ? 1 : 0;
                $word->wordAnswers()->create([
                    'content' => $request->$property_of_answer,
                    'correct' => $correct
                ]);
            }
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
