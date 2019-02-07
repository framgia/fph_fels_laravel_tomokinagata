<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Activity;

class Relationship extends Model
{
    protected $table = 'relationship';

    public $timestamps = false;

    protected $fillable = ['follower_id', 'followed_id'];

    public function following() 
    {
        $this->belongsTo(User::class, 'follower_id');
        return $this;
    }

    public function follower() 
    {
        $this->belongsTo(User::class, 'followed_id');
        return $this;
    }

    public function activitiy()
    {
       return $this->hasOne(Activity::class, 'action_id');
    }

    public static function scopeFindRelationship($query, $follower_id, $followed_id)
    {
        return $query->where('followed_id', $follower_id)->where('follower_id', $followed_id)->first();
    }
}
