<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\WordAnswer;

class Word extends Model
{
    protected $table = 'word';
    
    public $timestamps = false;

    public function category()
    {
       return $this->belognsTo(Category::class);
    }

    public function wordAnswers()
    {
       return $this->hasMany(WordAnswer::class);
    }

    public function createWord($request)
    {
        $this->category_id = $request->category_id;
        $this->content = $request->word;
        $this->save();
        return $this;
    }
}
