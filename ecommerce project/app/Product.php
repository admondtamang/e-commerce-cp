<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'description', 'price', 'image', 'stock_quantity', 'category_id', 'store_id'
    ];
}
