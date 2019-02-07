<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Lesson;
use App\Relationship;
use App\User;
use App\Category;
use App\Activity;

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
       return $this->hasMany(Lesson::class);
    }

    public function followers()
    {
       return $this->hasMany(Relationship::class, 'followed_id');
    }

    public function followings()
    {
       return $this->hasMany(Relationship::class, 'follower_id');
    }

    public function activities()
    {
        return $this->hasmany(Activity::class);
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

    public function getActivitiesToDisplay()
    {
        $followings = $this->getFollowings();
        $activities = $this->activities;
        foreach ($followings as $following) {
            $activities = $activities->merge($following->activities);
        }
        $activities = $activities->sortByDesc('id');
        
        $activitiesToDisplay = collect([]);
        foreach ($activities as $activity) {
            $activityToDisplay = [];
            $activityToDisplay['subject'] = $this->find($activity->user_id);
            $activityToDisplay['action'] = $activity->action_type;
            if ($activity->action_type === 'followed') {
                $activityToDisplay['object'] = $this->find((Relationship::find($activity->action_id))->followed_id);
            } else {
                $activityToDisplay['object'] = Category::find(Lesson::find($activity->action_id)->category_id);
            }
            $activityToDisplay['time'] = $activity->created_at;
            $activitiesToDisplay = $activitiesToDisplay->concat([$activityToDisplay]);
        }
        return $activitiesToDisplay;
    }

}
