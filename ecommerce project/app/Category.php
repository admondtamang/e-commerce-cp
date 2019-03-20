<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['category', 'description', 'url', 'parent_id'];

    public function childs()
    {
        return $this->hasMany('Category', 'parent_id');
    }
}
