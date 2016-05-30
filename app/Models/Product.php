<?php

namespace theGrocer\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'price', 'variant', 'unit', 'stock', 'description', 'product_pic', 'category_id', 'sku', 
    ];

    public static $rules = [
        'name'      => 'required|min:2,max:40|unique:products',
        'price'     => 'required|numeric',
        'variant'   => 'required',
        'unit'   => 'required',
        'category_id' => 'required',
        'product_pic' => 'required'
    ];

    public function admin()
    {
    	return $this->belongsTo('theGrocer\Models\Admin');
    } 

    public function category()
    {
    	return $this->belongsTo('theGrocer\Models\Category');
    }

}
