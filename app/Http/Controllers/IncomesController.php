<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IncomesController extends Controller
{
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
