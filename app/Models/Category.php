<?php

namespace theGrocer\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'slug', 'parent_id', 'description', 'category_pic'
    ];


    public function admin()
    {
    	return $this->belongsTo('theGrocer\Models\Admin');
    }

    public function products()
    {
        return $this->hasMany('theGrocer\Models\Product');
    }
}
