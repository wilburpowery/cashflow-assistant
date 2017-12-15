<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Desk extends Model
{
    protected $guarded = [];

    public static function hasAlreadyBeenClosed()
    {
        return self::where('business_id', auth()->user()->business->id)->whereDate('created_at', Carbon::today())->exists();
    }
}
