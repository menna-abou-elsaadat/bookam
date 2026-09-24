<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['unit_id', 'rent_type', 'tenant_phone', 'tenant_id_card_front', 'tenant_id_card_back','rent_amount','start_date','end_date','payment_status','number_of_adults','number_of_children','total_amount','notes'])]
class RentUnit extends Model
{
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function deposit()
    {
        return $this->hasOne(UnitDeposit::class);
    }
}
