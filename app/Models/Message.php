<?php

namespace theGrocer\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['name', 'email', 'phone_number', 'body', 'read'];

    public static function new_message()
    {
    	return count(self::where('read', 0)->get());
    }
}
