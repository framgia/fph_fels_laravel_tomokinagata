<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WordAnswer extends Model
{
    protected $table = 'word_answer';

    public $timestamps = false;

    public function correctAnswers(){
        return $this->where('correct', 1)->get();
    }

    public function create($word_id, $content, $correct)
    {
        $this->word_id = $word_id;
        $this->content = $content;
        $this->correct = $correct;
        $this->save();
        return $this;
    }

    public function findAnswers($word)
    {
        return $this->where('word_id', $word->id)->get();
    }

    public function updateAnswer($content, $correct)
    {
        $this->content = $content;
        $this->correct = $correct;
        $this->save();
        return $this;
    }
}
