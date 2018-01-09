<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;

class IncomesController extends Controller
{
    public function index()
    {
        return Transaction::where('transaction_type', 'App\Income')
        ->where('business_id', auth()->user()->business->id)
        ->whereDate('created_at', now()->toDateString())
        ->orderBy('created_at', 'desc')
        ->get();
    }

    public function store()
    {
        $data = request()->validate([
            'type'        => 'required',
            'description' => 'required',
            'total'       => 'required|numeric',
            ]);

        auth()->user()->business->transactions()->create([
                'type'             => $data['type'],
                'description'      => $data['description'],
                'total'            => $data['total'],
                'transaction_type' => 'App\Income',
                ]);
    }

    public function show(Transaction $income)
    {
        $this->authorize('view', $income);

        return $income;
    }

    public function update(Transaction $income)
    {
        $data = request()->validate([
                    'type'        => 'required',
                    'description' => 'required',
                    'total'       => 'required',
                    ]);

        $this->authorize('update', $income);

        $income->update($data);

        return $income;
    }

    public function destroy(Transaction $income)
    {
        $this->authorize('delete', $income);

        $income->delete();

        return response('Deleted', 202);
    }
}
