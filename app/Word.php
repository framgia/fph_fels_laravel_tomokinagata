<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    protected $table = 'word';
    
    public $timestamps = false;

    public function findWords($category)
    {
        return $this->where('category_id', $category->id)->orderBy('id', 'DESC')->get();
    }

    public function create($request)
    {
        $this->category_id = $request->category_id;
        $this->content = $request->word;
        $this->save();
        return $this;
    }
    
    public function getLatestId()
    {
        return $this->orderBy('id', 'DESC')->first()->id;
    }


}
