<?php

namespace App\Http\Controllers;

use App\Business;

class BusinessesController extends Controller
{
    public function store()
    {
        $data = request()->validate([
            'name'        => 'required',
            'description' => 'required',
        ]);

        $business = Business::create($data);

        return response(['message' => 'Business Stored', 'business' => $business], 201);
    }
}
