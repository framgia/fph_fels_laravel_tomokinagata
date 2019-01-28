<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
       return $this->belongsTo('App\Lesson', 'action_id');
    }

    public function relationship()
    {
       return $this->belongsTo('App\Relationship', 'action_id');
    }
}
