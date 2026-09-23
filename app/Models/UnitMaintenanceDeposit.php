<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['unit_id', 'amount','deposit_date','is_paid'])]
class UnitMaintenanceDeposit extends Model
{
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

}
