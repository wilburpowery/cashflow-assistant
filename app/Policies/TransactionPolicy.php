<?php

namespace App\Policies;

use App\Transaction;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TransactionPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Transaction $transaction)
    {
        return $user->business->id == $transaction->business_id;
    }

    public function update(User $user, Transaction $transaction)
    {
        return $user->business->id == $transaction->business_id;
    }

    public function delete(User $user, Transaction $transaction)
    {
        return $user->business->id == $transaction->business_id;
    }
}
