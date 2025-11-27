<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProfessionalProfile;
use App\Models\AvailabilitySlot;
use App\Models\Session;
use App\Models\ClientProfile;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BookingController extends Controller
{
    // Tampilkan daftar profesional
    public function index()
    {
        $professionals = ProfessionalProfile::with('user', 'specialization')->where('status_aktif', 1)->get();

        return view('booking.index', compact('professionals'));
    }

    // Tampilkan slot jadwal profesional
    public function showSlots($professional_id)
    {
        $professional = ProfessionalProfile::with('user', 'specialization')->findOrFail($professional_id);

        $slots = AvailabilitySlot::where('professional_id', $professional_id)
            ->where('tersedia', 1)
            ->orderBy('hari')
            ->get();

        return view('booking.slots', compact('professional', 'slots'));
    }

    // Proses booking
    public function createSession(Request $request, $professional_id)
    {
        $request->validate([
            'slot_id' => 'required|exists:AvailabilitySlot,slot_id'
        ]);

        $slot = AvailabilitySlot::findOrFail($request->slot_id);

        // Ambil client_id dari user login
        $clientProfile = ClientProfile::where('user_id', Auth::id())->first();

        if (!$clientProfile) {
            return back()->with('error', 'Profil klien tidak ditemukan.');
        }

        // Konversi hari & jam ke DATETIME
        $date = Carbon::now()->next($slot->hari); // otomatis ambil hari terdekat

        $waktu_mulai = Carbon::parse($date->format('Y-m-d') . ' ' . $slot->jam_mulai);
        $waktu_akhir = Carbon::parse($date->format('Y-m-d') . ' ' . $slot->jam_akhir);

        // Simpan sesi
        Session::create([
            'client_id' => $clientProfile->client_profile_id,
            'professional_id' => $professional_id,
            'slot_id' => $slot->slot_id,
            'waktu_mulai' => $waktu_mulai,
            'waktu_akhir' => $waktu_akhir,
            'jenis_sesi' => 'chat',
            'status_sesi' => 'Menunggu Pembayaran',
        ]);

        // Tandai slot jadi tidak tersedia
        $slot->update(['tersedia' => 0]);

        return redirect('/dashboard')->with('success', 'Booking berhasil! Silakan melakukan pembayaran.');
    }
}
