<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Desk extends Model
{
    protected $guarded = [];

    public static function hasAlreadyBeenClosed()
    {
        return self::where('business_id', auth()->user()->business->id)->whereDate('created_at', Carbon::today())->exists();
    }
}
