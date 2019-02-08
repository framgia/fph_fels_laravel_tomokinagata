<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\WordAnswer;

class Word extends Model
{
    protected $table = 'word';

    protected $fillable = [
        'category_id', 'content'
    ];
    
    public $timestamps = false;

    public function category()
    {
       return $this->belongsTo(Category::class);
    }

    public function wordAnswers()
    {
       return $this->hasMany(WordAnswer::class);
    }
}
