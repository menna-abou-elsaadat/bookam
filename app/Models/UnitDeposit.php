<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['rent_unit_id', 'amount', 'status', 'return_date', 'reason'])]
class UnitDeposit extends Model
{
    public function rentUnit()
    {
        return $this->belongsTo(RentUnit::class);
    }
}
