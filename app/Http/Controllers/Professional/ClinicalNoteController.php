<?php

namespace App\Http\Controllers\Professional;

use App\Http\Controllers\Controller;
use App\Models\ClinicalNote;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClinicalNoteController extends Controller
{
    // List catatan untuk profesional
    public function index()
    {
        $notes = ClinicalNote::where('professional_id', Auth::id())
            ->with('client')
            ->latest()
            ->paginate(10);

        return view('professional.notes.index', compact('notes'));
    }

    // Form tambah catatan
    public function create($appointmentId = null)
    {
        $appointment = Appointment::find($appointmentId);
        return view('professional.notes.create', compact('appointment'));
    }

    // Simpan catatan
    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required',
            'summary' => 'required',
        ]);

        ClinicalNote::create([
            'professional_id' => Auth::id(),
            'client_id' => $request->client_id,
            'appointment_id' => $request->appointment_id,
            'summary' => $request->summary,
            'notes' => $request->notes,
            'session_type' => $request->session_type,
        ]);

        return redirect()->route('professional.notes.index')
            ->with('success', 'Catatan klinis berhasil dibuat.');
    }

    // Lihat catatan lengkap
    public function show($id)
    {
        $note = ClinicalNote::where('professional_id', Auth::id())->findOrFail($id);
        return view('professional.notes.show', compact('note'));
    }
}
