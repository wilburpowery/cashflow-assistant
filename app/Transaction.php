<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $guarded = [];

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

    public function scopeFromToday($query)
    {
        return $query->whereDate('created_at', Carbon::today())->where('business_id', auth()->user()->business->id);
    }

    public function scopeIncomes($query)
    {
        return $query->where('transaction_type', 'App\Income');
    }

    public function scopeExpenses($query)
    {
        return $query->where('transaction_type', 'App\Expense');
    }
}
