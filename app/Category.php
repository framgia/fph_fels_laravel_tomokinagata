<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Word;
use App\Lesson;

class Category extends Model
{
    protected $table = 'category';
    
    public $timestamps = false;

    public function words()
    {
       return $this->hasMany(Word::class);
    }

    public function lessons()
    {
       return $this->hasMany(Lesson::class);
    }

    public function getCategories($number)
    {
        return $this->orderBy('id', 'DESC')->paginate($number);
    }

    public function create($request)
    {
        $this->title = $request->title;
        $this->description = $request->description;
        $this->save();
        return $this;
    }

    public function updateCategory($request)
    {
        $this->title = $request->title;
        $this->description = $request->description;
        $this->save();
        return $this;
    }
}
