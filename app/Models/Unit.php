<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['code_number','address','city','country','area','payment_status','total_price'])]
class Unit extends Model
{
    public function Owners()
    {
        return $this->belongsToMany(Owner::class);
    }
}
