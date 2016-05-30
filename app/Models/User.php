<?php

namespace theGrocer\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Cashier\Billable;
class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    use Billable;

    protected $dates = ['trial_ends_at', 'subscription_ends_at'];


    protected $fillable = ['first_name', 'last_name', 'email', 'password', 'address', 'hold_name', 'hold_no','road_no', 'hold_area', 'phone_number'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    public static $rules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:6, max:14|confirmed',
        'hold_name' => 'required',
        'hold_no' => 'required',
        'road_no' => 'required',
        'hold_area' => 'required',
        'phone_number' => 'required',
    ]; 

    public function order()
    {
        return $this->hasMany('theGrocer\Models\Order');
    }

    public function fullname()
       {
           $first_name =  $this->first_name;
           $last_name =  $this->last_name;
           return ucfirst($first_name)  . " " . ucfirst($last_name);
       }   
}
