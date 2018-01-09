<?php

namespace App;

use App\Exceptions\DeskWasAlreadyClosed;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'business_id', 'is_admin',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'is_admin' => 'boolean',
    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    public function addPayment($data)
    {
        return Payment::create([
            'business_id' => $this->business->id,
            'client_id'   => $data['client_id'],
            'date'        => $data['date'],
            'total'       => $data['total'],
            'description' => $data['description'],
            'payed'       => $data['payed'],
        ]);
    }

    public function closeDesk($data)
    {
        if (Desk::hasAlreadyBeenClosed()) {
            throw new DeskWasAlreadyClosed();
        }

        return Desk::create([
            'business_id'        => $this->business->id,
            'initial_balance'    => $data['initial_balance'],
            'income'             => $data['income'],
            'expense'            => $data['expense'],
            'transfers'          => $data['transfers'],
            'card_payments'      => $data['card_payments'],
            'earn_sp'            => $data['earn_sp'],
            'deposit_sp'         => $data['deposit_sp'],
            'commission_sp'      => $data['commission_sp'],
            'refills'            => $data['refills'],
            'commission_refills' => $data['commission_refills'],
            'cash_box'           => $data['cash_box'],
            'final_balance'      => $data['final_balance'],
            'real_balance'       => $data['real_balance'],
        ]);
    }
}
