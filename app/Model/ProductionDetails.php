<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductionDetails extends Model
{
    protected $fillable = ['po_id', 'sample_id', 'po_qty', 'sewing_qty', 'wash_qty', 'finished_qty', 'westage', 'date'];
}
