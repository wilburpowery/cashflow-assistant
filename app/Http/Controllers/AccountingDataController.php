<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\DailyBudget;

class AccountingDataController extends Controller
{
    public function __invoke()
    {
        $dailyBudget = DailyBudget::fromToday()->only('total');

        $transactionsToday = Transaction::fromToday()->get();

        $incomes = $transactionsToday->filter(function ($transaction) {
            return $transaction->transaction_type == 'App\Income';
        })->sum('total');

        $expenses = $transactionsToday->filter(function ($transaction) {
            return  $transaction->transaction_type == 'App\Expense';
        })->sum('total');

        return response([
            'dailyBudget' => $dailyBudget,
            'income' => $incomes,
            'expense' => $expenses
        ]);
    }
}
