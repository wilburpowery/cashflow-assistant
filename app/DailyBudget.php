<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class DailyBudget extends Model
{
    protected $guarded = [];

    public static function fromToday()
    {
        return self::where('business_id', auth()->user()->business->id)->whereDate('created_at', Carbon::today())->first();
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
}
