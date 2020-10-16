<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['buyer_id', 'LC', 'bank', 'order_date', 'shipment_date', 'shipment_type'];
}
