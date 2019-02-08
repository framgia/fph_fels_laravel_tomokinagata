<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Lesson;
use App\Relationship;

class Activity extends Model
{
    protected $table = "activity";

    protected $fillable = ['user_id', 'action_id', 'action_type'];

    public function user()
    {
       return $this->belongsTo('App\User');
    }

    public function lesson()
    {
       return $this->belongsTo(Lesson::class, 'action_id');
    }

    public function relationship()
    {
       return $this->belongsTo(Relationship::class, 'action_id');
    }
}
