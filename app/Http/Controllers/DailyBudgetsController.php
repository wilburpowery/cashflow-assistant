<?php

namespace App\Http\Controllers;

use App\DailyBudget;
use Illuminate\Http\Request;

class DailyBudgetsController extends Controller
{
    public function index()
    {
        $budget = DailyBudget::fromToday();

        return response(['budget' => $budget ?: '']);
    }

    public function store()
    {
        $data = request()->validate([
            'daily_budget' => 'required|numeric',
        ]);

        $budget = DailyBudget::create([
            'business_id' => auth()->user()->business->id,
            'total'       => $data['daily_budget'],
        ]);

        return $budget;
    }
}
