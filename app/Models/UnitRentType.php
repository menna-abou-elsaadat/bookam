<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use App\Scopes\ActiveScope;

#[Fillable(['unit_id', 'rent_type', 'maintenance_deposit', 'maintenance_deposit_custom', 'is_active'])]
class UnitRentType extends Model
{
    protected static function booted(): void
    {
        static::addGlobalScope(new ActiveScope);

        static::saving(function (self $rentType): void {
            if ($rentType->maintenance_deposit === 'other') {
                $rentType->maintenance_deposit = $rentType->maintenance_deposit_custom;
            }

            $rentType->offsetUnset('maintenance_deposit_custom');
        });
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

}
