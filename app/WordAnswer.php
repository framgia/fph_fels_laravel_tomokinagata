<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WordAnswer extends Model
{
    protected $table = 'word_answer';

    public $timestamps = false;

    protected $fillable= array('word_id', 'content', 'correct');

    public function word()
    {
       return $this->belongsTo('App\Word');
    }
}
