<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['unit_id', 'owner_id', 'share_percentage'])]
class UnitOwner extends Model
{
    public function Unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function Owner()
    {
        return $this->belongsTo(Owner::class);
    }
}
