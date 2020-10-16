<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\ProductionDetails;

class Production extends Model
{
    protected $fillable = ['order_id', 'po_date', 'description'];

    public function details()
    {
        return $this->hasMany(ProductionDetails::class);
    }
}
