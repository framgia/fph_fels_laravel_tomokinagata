<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Lesson;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'avatar', 'admin', 'password',
    ];

    protected $hidden = [
        'password',
    ];

    public function lessons()
    {
       return $this->hasMany('App\Lesson');
    }

    public function followers()
    {
       return $this->hasMany('App\Relationship', 'followed_id');
    }

    public function followings()
    {
       return $this->hasMany('App\Relationship', 'follower_id');
    }

    public function wordsLearned()
    {
        $lessons = $this->lessons()->get();
        $words = [];
        $word_answers = [];
        foreach ($lessons as $lesson) {
            $lesson_words = LessonWord::where('lesson_id', $lesson->id)->get();
            foreach ($lesson_words as $lesson_word) {
                array_push($words, Word::find($lesson_word->word_id)->content);
                array_push($word_answers, WordAnswer::find($lesson_word->word_answer_id)->content);
            } 
        }
        return array('words' => $words, 'word_answers' => $word_answers);
    }

    public function countWordsLearned()
    {
        $learned_words  = 0;
        foreach ($this->lessons()->get() as $lesson) {
            $learned_words = ($learned_words !== 0) ? count($lesson->lessonWords()->get()) + $learned_words : count($lesson->lessonWords()->get());
        }
        return $learned_words;
    }

    public function relation ($account)
    {
        $relation = count($this->followings()->where('followed_id', $account->id)->get()) === 0 ? TRUE : FALSE;
        return $relation;
    }

    public function getFollowers ()
    {
        $followers = [];
        foreach ($this->followers()->get() as $follower) {
            array_push($followers, User::find($follower->follower_id));
        }
        return $followers;
    }

    public function getFollowings ()
    {
        $followings = [];
        foreach ($this->followings()->get() as $following) {
            array_push($followings, User::find($following->followed_id));
        }
        return $followings;
    }
}
