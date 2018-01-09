<?php

namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Validation\Rule;

class PaymentsController extends Controller
{
    public function index()
    {
        $payments = Payment::fromToday()->where('business_id', auth()->user()->business->id)->with('client')->get();

        return $payments;
    }

    public function store()
    {
        $data = request()->validate([
            'client_id' => [
                        'required',
                        Rule::exists('clients', 'id')->where(function ($query) {
                            $query->where('business_id', auth()->user()->business->id);
                        }),
                    ],
            'date'        => 'required|date',
            'total'       => 'required',
            'description' => 'required',
            'payed'       => 'required|boolean',
        ]);

        $payment = auth()->user()->addPayment($data);

        return $payment;
    }

    public function show(Payment $payment)
    {
        $this->authorize('view', $payment);

        return $payment;
    }

    public function update(Payment $payment)
    {
        $this->authorize('update', $payment);

        $data = request()->validate([
            'date'        => 'required|date',
            'total'       => 'required',
            'description' => 'required',
            'payed'       => 'required|boolean',
        ]);

        $payment->update($data);

        return $payment;
    }

    public function destroy(Payment $payment)
    {
        $this->authorize('delete', $payment);
        $payment->delete();

        return response('Deleted', 202);
    }
}
