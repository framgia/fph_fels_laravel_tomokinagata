<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relationship extends Model
{
    protected $table = 'relationship';

    public $timestamps = false;

    protected $fillable = ['follower_id', 'followed_id'];

    public function following() 
    {
        $this->belogsTo('App\User', 'follower_id');
        return $this;
    }

    public function follower() 
    {
        $this->belogsTo('App\User', 'followed_id');
        return $this;
    }

}
