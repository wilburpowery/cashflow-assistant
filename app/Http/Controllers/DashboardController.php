<?php

namespace App\Http\Controllers;

use App\Transaction;

class DashboardController extends Controller
{
    public function index()
    {
        $dailyBudget = DailyBudget::fromToday();

        $transactionsToday = Transaction::fromToday()->get();

        $incomes = $transactionsToday->filter(function ($transaction) {
            return $transaction->transaction_type == 'App\Income';
        })->sum('total');

        $expenses = $transactionsToday->filter(function ($transaction) {
            return  $transaction->transaction_type == 'App\Expense';
        })->sum('total');

        return response([
            'dailyBudget' => $dailyBudget,
            'income'      => $incomes,
            'expense'     => $expenses,
        ]);
    }

    public function latestStats()
    {
        $incomes = Transaction::fromToday()->latest()->incomes()->limit(3)->get();
        $expenses = Transaction::fromToday()->latest()->expenses()->limit(3)->get();

        return response(['incomes' => $incomes, 'expenses' => $expenses], 200);
    }
}
