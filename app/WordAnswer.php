<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Word;

class WordAnswer extends Model
{
    protected $table = 'word_answer';

    public $timestamps = false;

    protected $fillable= array('word_id', 'content', 'correct');

    public function word()
    {
       return $this->belongsTo(Word::class);
    }
}
