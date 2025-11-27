<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ProfessionalProfile;
use App\Models\ClientProfile;
use App\Models\AvailabilitySlot;
use App\Models\Session;

class DashboardController extends Controller
{
    public function index()
{
    $users = Auth::user();

    if ($users->tipe_pengguna === 'Admin') {
        return $this->adminDashboard($users);
    }

    if ($users->tipe_pengguna === 'Client') {
        return $this->clientDashboard($users);
    }

    if ($users->tipe_pengguna === 'Professional') {
        return $this->professionalDashboard($users);
    }

    abort(403, "Role tidak dikenal");
}

    protected function clientDashboard($users)
    {
        // Load client profile and sessions(appointments)
        $clientProfile = ClientProfile::where('user_id', $users->id)->first();

        $sessions = [];
        if ($clientProfile) {
            $sessions = $clientProfile->sessions()->with('professional')->get();
        }

        // Load professionals and their availability to show for booking
        $professionals = ProfessionalProfile::where('status_aktif', true)
            ->with(['users', 'specialization', 'availabilitySlots'])
            ->get();

        return view('dashboard.client', [
            'user' => $users,
            'clientProfile' => $clientProfile,
            'professionals' => $professionals,
            'sessions' => $sessions,
]);

    }

    protected function professionalDashboard($users)
    {
        // Load professional profile, availability slots, sessions and session notes
        $professionalProfile = ProfessionalProfile::where('user_id', $users->id)->first();

        $availabilitySlots = collect();
        $sessions = collect();

        if ($professionalProfile) {
            $availabilitySlots = $professionalProfile->availabilitySlots()->get();
            $sessions = $professionalProfile->sessions()->with('client')->get();
        }

        return view('dashboard.professional', [
            'user' => $users,
            'professionalProfile' => $professionalProfile,
            'availabilitySlots' => $availabilitySlots,
            'sessions' => $sessions,
        ]);
    }

    protected function adminDashboard($users)
    {
        // Load admin statistics (consistent with AdminDashboardController)
        $totalClients = \App\Models\User::where('tipe_pengguna', 'Client')->count();
        $totalProfessionals = \App\Models\User::where('tipe_pengguna', 'Professional')->count();
        $totalPendingVerification = \App\Models\ProfessionalProfile::where('status_aktif', false)->count();

        return view('admin.dashboard', [
            'user' => $users,
            'totalClients' => $totalClients,
            'totalProfessionals' => $totalProfessionals,
            'totalPendingVerification' => $totalPendingVerification,
        ]);
    }
}
