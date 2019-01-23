<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    
    public $timestamps = false;

    public function index($number)
    {
        $categories = $this->orderBy('id', 'DESC')->paginate($number);
        return $categories;
    }

    public function create($request)
    {
        $this->title = $request->title;
        $this->description = $request->description;
        $this->save();
        return $this;
    }

    public function updateCategory($request, $category)
    {
        $category->title = $request->title;
        $category->description = $request->description;
        $category->save();
        return $category;
    }
}
