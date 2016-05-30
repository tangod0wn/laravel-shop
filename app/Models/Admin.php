<?php

namespace theGrocer\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $fillable = [
        'first_name', 'last_name', 'username', 'email', 'password',
    ];

    public function full_name()
    {
        return $this->first_name . " " . $this->last_name;
    }

}
