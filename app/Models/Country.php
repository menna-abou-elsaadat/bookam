<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

#[Fillable(['name_en', 'name_ar', 'iso2', 'iso3', 'numeric_code'])]
class Country extends Model
{
    public function cities(): HasMany
    {
        return $this->hasMany(City::class);
    }

    public function areas(): HasManyThrough
    {
        return $this->hasManyThrough(Area::class, City::class);
    }

    public function villages(): HasManyThrough
    {
        return $this->hasManyThrough(Village::class, City::class);
    }
}
