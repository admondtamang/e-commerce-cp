<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $fillable = ['first_name', 'last_name', 'primary_address', 'secondary_address', 'phone'];
}
