<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DailyBudget;

class DailyBudgetsController extends Controller
{
    public function index()
    {
        $budget = DailyBudget::fromToday();

        return $budget;
    }

    public function store()
    {
        $data = request()->validate([
            'daily_budget' => 'required|numeric'
        ]);

        $budget = DailyBudget::create([
            'business_id' => auth()->user()->business->id,
            'total' => $data['daily_budget']
        ]);

        return $budget;
    }
}
