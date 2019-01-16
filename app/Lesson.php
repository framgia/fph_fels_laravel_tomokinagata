<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $table = 'lesson';

    public function user()
    {
       return $this->belognsTo('App\User');
    }

    public function category()
    {
       return $this->belognsTo('App\Category');
    }

    public function lessonWords()
    {
       return $this->hasMany('App\LessonWord');
    }

    public function create($category_id, $user_id)
    {
       $this->category_id = $category_id;
       $this->user_id = $user_id;
       $this->save();
       return $this;
    }



}
