<?php

namespace App\Http\Controllers\Professional;

use App\Http\Controllers\Controller;
use App\Models\AvailabilitySlot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AvailabilityController extends Controller
{
    public function index()
    {
        $professional = Auth::user()->professional;

        $slots = AvailabilitySlot::where('professional_id', $professional->id)
            ->orderBy('hari')
            ->orderBy('jam_mulai')
            ->get();

        return view('professional.availability.index', compact('slots'));
    }

    public function create()
    {
        return view('professional.availability.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_akhir' => 'required|after:jam_mulai',
        ]);

        $professional = Auth::user()->professional;

        AvailabilitySlot::create([
            'professional_id' => $professional->id,
            'hari' => $request->hari,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
        ]);

        return redirect()->back()->with('success', 'Slot ketersediaan berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $slot = AvailabilitySlot::findOrFail($id);

        // Pastikan slot punya profesional ini
        if ($slot->professional_id != Auth::user()->professional->id) {
            abort(403);
        }

        $slot->delete();

        return redirect()->back()->with('success', 'Slot berhasil dihapus.');
    }
}
