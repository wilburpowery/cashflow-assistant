<?php

namespace App\Http\Controllers;

class DeskClosesController extends Controller
{
    public function store()
    {
        $data = request()->validate([
            'initial_balance'    => 'required|numeric',
            'income'             => 'required|numeric',
            'expense'            => 'required|numeric',
            'transfers'          => 'required|numeric',
            'card_payments'      => 'required|numeric',
            'earn_sp'            => 'required|numeric',
            'deposit_sp'         => 'required|numeric',
            'commission_sp'      => 'required|numeric',
            'refills'            => 'required|numeric',
            'commission_refills' => 'required|numeric',
            'cash_box'           => 'required|numeric',
            'final_balance'      => 'required|numeric',
            'real_balance'       => 'required|numeric',
            ]);

        auth()->user()->closeDesk($data);

        return response(['message' => 'Desk Closed'], 200);
    }
}
