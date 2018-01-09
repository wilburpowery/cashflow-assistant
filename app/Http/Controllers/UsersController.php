<?php

namespace App\Http\Controllers;

use App\Rules\MustBeCurrentPassword;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::where('business_id', auth()->user()->business->id)->orderBy('is_admin', 'desc')->get();

        return $users;
    }

    public function store()
    {
        $data = request()->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
        ]);

        User::create([
            'business_id' => auth()->user()->business->id,
            'name'        => $data['name'],
            'email'       => $data['email'],
            'password'    => Hash::make($data['password']),
        ]);

        return response('User created', 201);
    }

    public function update(User $user)
    {
        $data = request()->validate([
            'name'  => 'required',
            'email' => ['required',
                Rule::unique('users')->ignore(auth()->id())->where(function ($query) {
                    $query->where('business_id', auth()->user()->business->id);
                }),
            ],
            'password' => ['required', new MustBeCurrentPassword()],
        ]);

        auth()->user()->update([
            'name'  => $data['name'],
            'email' => $data['email'],
        ]);

        return auth()->user();
    }
}
