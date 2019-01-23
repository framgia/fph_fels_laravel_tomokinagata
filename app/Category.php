<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    
    public $timestamps = false;

    public function create($request)
    {
        $this->title = $request->title;
        $this->description = $request->description;
        $this->save();
        return $this;
    }
}
