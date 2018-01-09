<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;

class ExpensesController extends Controller
{
    public function index()
    {
        return Transaction::where('transaction_type', 'App\Expense')
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
                'transaction_type' => 'App\Expense',
                ]);
    }

    public function show(Transaction $expense)
    {
        $this->authorize('view', $expense);

        return $expense;
    }

    public function update(Transaction $expense)
    {
        $data = request()->validate([
                    'type'        => 'required',
                    'description' => 'required',
                    'total'       => 'required',
                    ]);

        $this->authorize('update', $expense);

        $expense->update($data);

        return $expense;
    }

    public function destroy(Transaction $expense)
    {
        $this->authorize('delete', $expense);

        $expense->delete();

        return response('Deleted', 202);
    }
}
