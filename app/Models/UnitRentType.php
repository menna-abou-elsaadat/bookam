<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use App\Scopes\ActiveScope;

#[Fillable(['unit_id', 'name', 'description', 'duration_value', 'duration_unit', 'is_active'])]
class UnitRentType extends Model
{
    protected static function booted(): void
    {
        static::addGlobalScope(new ActiveScope);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

}
