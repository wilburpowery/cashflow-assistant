<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\User;
use App\Client;

class ClientPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Client $client)
    {
        return $user->business->id == $client->business_id;
    }

    public function update(User $user, Client $client)
    {
        return $user->business->id == $client->business_id;
    }

    public function delete(User $user, Client $client)
    {
        return $user->business->id == $client->business_id;
    }
}
