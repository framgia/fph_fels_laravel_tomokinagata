<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LessonWord extends Model
{
   protected $table = 'lesson_word';

   public $timestamps = false;

   protected $fillable = [
      'lesson_id', 'word_id', 'word_answer_id'
   ];

   public function lesson()
   {
      return $this->belognsTo('App\Lesson');
   }

   public function word()
   {
      return $this->belognsTo('App\Word');
   }

   public function wordAnswer()
   {
      return $this->belognsTo('App\WordAnswer');
   }

   public function create($lesson_id, $word_id, $word_answer_id)
   {
      $this->lesson_id = $lesson_id;
      $this->word_id = $word_id;
      $this->word_answer_id = $word_answer_id;
      $this->save();
      return $this;
   }
}
