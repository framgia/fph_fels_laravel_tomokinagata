<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    
    public $timestamps = false;

    public function words()
    {
       return $this->hasMany('App\Word');
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
