<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Client;

class ClientsController extends Controller
{
    public function index()
    {
        return auth()->user()->business->clients;
    }

    public function store()
    {
        $data = request()->validate([
            'first_name' => 'required|string|min:1',
            'last_name' => 'required|string|min:1',
            'email' => [
                'required',
                'email',
                Rule::unique('clients')->where(function ($query) {
                    return $query->where('business_id', auth()->user()->business->id);
                })
            ],
            'phone_number' => 'required'
        ]);

        $client = auth()->user()->business->addClient($data);

        return $client;
    }

    public function show($id)
    {
        return Client::where('business_id', auth()->user()->business->id)->findOrFail($id);
    }
}
