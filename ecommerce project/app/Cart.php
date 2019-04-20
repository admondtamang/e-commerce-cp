<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['product_id', 'image', 'name', 'price', 'quantity', 'stock', 'session_id'];
}
