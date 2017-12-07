<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $guarded = [];

    public function setTotalAttribute($value)
    {
        $this->attributes['total'] = (floatval($value) * 100);
    }
}
