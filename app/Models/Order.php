<?php

namespace theGrocer\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['order_no', 'user_id','address', 'message', 'total'];

	public function orderItems() {
		return $this->belongsToMany('theGrocer\Models\Product')->withPivot('amount','total'); 
	}  

	public function User()
    {
        return $this->belongsTo('theGrocer\Models\User');
    }

}
