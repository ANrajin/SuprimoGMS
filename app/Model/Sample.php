<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Sample extends Model
{
    protected $fillable = ['merchandiser', 'buyer_id', 'season', 'style_no', 'sample_name', 'sample_type', 'product_type_id','unit_cost', 'unit_price', 'descriptions', 'specifications', 'image'];
}
