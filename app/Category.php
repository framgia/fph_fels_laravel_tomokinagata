<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    
    public $timestamps = false;

    public function create($request)
    {
        $category = new Category();
        $category->title = $request->title;
        $category->description = $request->description;
        $category->save();
        return $category;
    }
}
