<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['product_id', 'name', 'description', 'price', 'quantity', 'session_id'];
}
