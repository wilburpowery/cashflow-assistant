<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;

class IncomesController extends Controller
{
    public function index()
    {
        return Transaction::where('transaction_type', 'App\Income')
                            ->where('business_id', auth()->user()->business->id)
                            ->whereDate('created_at', now()->toDateString())
                            ->get();
    }

    public function store()
    {
        $data = request()->validate([
            'type' => 'required',
            'description' => 'required',
            'total' => 'required|numeric'
        ]);

        auth()->user()->business->transactions()->create([
            'type' => $data['type'],
            'description' => $data['description'],
            'total' => $data['total'],
            'transaction_type' => 'App\Income'
        ]);
    }
}
