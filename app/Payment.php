<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $guarded = [];

    protected $casts = [
        'payed' => 'boolean',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * Convert to cents before saving.
     *
     * @param string $value
     *
     * @return void
     */
    public function setTotalAttribute($value)
    {
        $this->attributes['total'] = (floatval($value) * 100);
    }

    /**
     * Convert the total back to decimal value.
     */
    public function getTotalAttribute()
    {
        return $this->attributes['total'] / 100;
    }

    public function setDateAttribute($date)
    {
        $this->attributes['date'] = Carbon::parse($date);
    }

    public function scopeFromToday($query)
    {
        return $query->whereDate('created_at', Carbon::today());
    }
}
