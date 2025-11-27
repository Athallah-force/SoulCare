<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Professional;

class AvailabilityController extends Controller
{
    public function index()
    {
        $professionals = Professional::with(['user', 'specialization', 'availabilitySlots'])
            ->get();

        return view('client.availability.index', compact('professionals'));
    }

    
}
