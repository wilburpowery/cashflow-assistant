<?php

namespace App\Http\Controllers;

use App\Transaction;

class GraphsController extends Controller
{
    public function income()
    {
        $income = Transaction::FromToday()->incomes()->get()->sum('total');

        $expense = Transaction::fromToday()->expenses()->get()->sum('total');

        return [
            'Ingresos' => $income,
            'Egresos'  => $expense,
        ];
    }
}
