<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['unit_id', 'from_date', 'to_date'])]
class UnitLockedDates extends Model
{
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
