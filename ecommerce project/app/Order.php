<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'product_id', 'order_date', 'product_quantity', 'address', 'phone', 'email', 'postal_code', 'name'];
}
