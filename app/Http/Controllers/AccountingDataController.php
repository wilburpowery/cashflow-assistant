<?php

namespace App\Http\Controllers;

use App\DailyBudget;
use App\Desk;
use App\Transaction;

class AccountingDataController extends Controller
{
    public function __invoke()
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
            'alreadyHasClosedDesk' => Desk::hasAlreadyBeenClosed(),
            'dailyBudget'          => $dailyBudget,
            'income'               => $incomes,
            'expense'              => $expenses,
        ]);
    }
}
