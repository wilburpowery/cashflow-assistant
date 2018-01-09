<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ClientsController extends Controller
{
    public function index()
    {
        if ($search = request('q')) {
            $client = Client::where('name', 'like', "%$search%")->get();

            return $client;
        }

        $clients = auth()->user()->business->clients()->orderBy('name')->paginate(10);

        return $clients;
    }

    public function store()
    {
        $data = request()->validate([
            'name'  => 'required|string|min:1',
            'email' => [
                'required',
                'email',
                Rule::unique('clients')->where(function ($query) {
                    return $query->where('business_id', auth()->user()->business->id);
                }),
            ],
            'phone_number' => 'required',
        ]);

        $client = auth()->user()->business->addClient($data);

        return $client;
    }

    public function show(Client $client)
    {
        $this->authorize('view', $client);

        return $client;
    }

    public function update(Client $client)
    {
        $this->authorize('update', $client);

        $data = request()->validate([
            'name'  => 'required|string|min:1',
            'email' => [
                'required',
                'email',
                Rule::unique('clients')->ignore($client->id)->where(function ($query) {
                    return $query->where('business_id', auth()->user()->business->id);
                }),
            ],
            'phone_number' => 'required',
        ]);

        $client->update($data);

        return $client;
    }

    public function destroy(Client $client)
    {
        $this->authorize('delete', $client);

        $client->delete();

        return response('Deleted', 202);
    }
}
