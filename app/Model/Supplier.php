<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
        'unique_id',
        'supplier_name',
        'company_name',
        'phone',
        'email',
        'address',
        'country_id',
        'city_id',
        'supplier_of',
        'supplier_type'
    ];
}
