<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Business extends Model
{
    protected $guarded = [];

    /**
     * Users relationship.
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function clients()
    {
        return $this->hasMany(Client::class);
    }

    /**
     * Daily Budgets relationship.
     */
    public function dailyBudgets()
    {
        return $this->hasMany(DailyBudget::class);
    }

    /**
     * Transactions relationship.
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function addClient($data)
    {
        return $this->clients()->create([
            'name'         => $data['name'],
            'email'        => $data['email'],
            'phone_number' => $data['phone_number'],
        ]);
    }
}
