<?php

namespace App;

trait Owner
{
    public function units()
    {
        return $this->belongsToMany(
            Unit::class,
            "unit_owners",
            "owner_id",
            "unit_id",
        )
            ->withPivot("share_percentage")
            ->withTimestamps();
    }
}
