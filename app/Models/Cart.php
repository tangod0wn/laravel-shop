<?php

namespace theGrocer\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['user_id', 'product_id', 'total', 'amount'];


    public function Products()
    {
        return $this->belongsTo('theGrocer\Models\Product', 'product_id');
    }    
}
