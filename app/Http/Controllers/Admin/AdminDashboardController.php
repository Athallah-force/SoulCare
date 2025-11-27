<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\ProfessionalProfile;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Statistik cepat untuk dashboard
        $totalClients = User::where('tipe_pengguna', 'Client')->count();
        $totalProfessionals = User::where('tipe_pengguna', 'Professional')->count();
        $totalPendingVerification = ProfessionalProfile::where('status_aktif', false)->count();

        return view('admin.dashboard', compact(
            'totalClients',
            'totalProfessionals',
            'totalPendingVerification'
        ));
    }
}
