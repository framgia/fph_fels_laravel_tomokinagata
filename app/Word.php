<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    protected $table = 'word';
    
    public $timestamps = false;

    public function category()
    {
       return $this->belognsTo('App\Category');
    }

    public function wordAnswers()
    {
       return $this->hasMany('App\WordAnswer');
    }

    public function createWord($request)
    {
        $this->category_id = $request->category_id;
        $this->content = $request->word;
        $this->save();
        return $this;
    }
}
