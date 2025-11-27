<?php

namespace App\Http\Controllers\Professional;

use App\Http\Controllers\Controller;
use App\Models\Session;
use App\Models\ClinicalNote;
use Illuminate\Support\Facades\Auth;

class ClinicalHistoryController extends Controller
{
    public function index()
    {
        // Ambil semua sesi milik profesional
        $sessions = Session::with(['client.user'])
            ->where('professional_id', Auth::user()->professional->id)
            ->orderBy('tanggal_janji', 'desc')
            ->get();

        return view('professional.history.index', compact('sessions'));
    }

    public function show($sessionId)
    {
        // Ambil detail sesi + catatan klinis
        $session = Session::with(['client.user', 'professional.user'])
            ->where('professional_id', Auth::user()->professional->id)
            ->findOrFail($sessionId);

        $notes = ClinicalNote::where('session_id', $sessionId)->get();

        return view('professional.history.show', compact('session', 'notes'));
    }
}
