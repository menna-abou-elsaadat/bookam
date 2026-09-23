<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['unit_id', 'name', 'price', 'description', 'image_url', 'quantity'])]
class UnitFurniture extends Model
{
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

}
