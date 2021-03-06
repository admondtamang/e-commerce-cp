<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $fillable = ['name', 'email', 'address', 'postal_code', 'phone', 'user_id'];
}
