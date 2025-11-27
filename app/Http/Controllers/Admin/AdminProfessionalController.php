<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminProfessionalController extends Controller
{
    // =======================
    // LIST PROFESIONAL
    // =======================
    public function index()
    {
        $professionals = User::where('tipe_pengguna', 'Professional')->get();
        return view('admin.professionals.index', compact('professionals'));
    }

    // =======================
    // FORM CREATE
    // =======================
    public function create()
    {
        return view('admin.professionals.create');
    }

    // =======================
    // STORE DATA
    // =======================
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'nomor_telepon' => 'nullable|string',
        ]);

        User::create([
            'name'  => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nomor_telepon' => $request->nomor_telepon,
            'tipe_pengguna' => 'Professional',
            'is_verified'   => false, // default belum terverifikasi
        ]);

        return redirect()->route('admin.professional.index')->with('success', 'Professional berhasil ditambahkan');
    }

    // =======================
    // EDIT
    // =======================
    public function edit($id)
    {
        $professional = User::findOrFail($id);

        return view('admin.professionals.edit', compact('professional'));
    }

    // =======================
    // UPDATE
    // =======================
    public function update(Request $request, $id)
    {
        $professional = User::findOrFail($id);

        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => "required|email|unique:users,email,$id",
            'nomor_telepon' => 'nullable|string',
            'password' => 'nullable|min:6',
        ]);

        $professional->name = $request->name;
        $professional->email = $request->email;
        $professional->nomor_telepon = $request->nomor_telepon;

        if ($request->password) {
            $professional->password = Hash::make($request->password);
        }

        $professional->save();

        return redirect()->route('admin.professional.index')->with('success', 'Data professional berhasil diperbarui');
    }

    // =======================
    // DELETE
    // =======================
    public function destroy($id)
    {
        $professional = User::findOrFail($id);
        $professional->delete();

        return redirect()->route('admin.professional.index')->with('success', 'Professional berhasil dihapus');
    }

    // ============================
    // LIST PROFESSIONAL PENDING
    // ============================
    public function pending()
    {
        $pending = ProfessionalProfile::where('status_aktif', false)->get();

        return view('admin.professional.pending', compact('pending'));
    }

    // ============================
    // DETAIL PROFESSIONAL
    // ============================
    public function detail($id)
    {
        $professional = ProfessionalProfile::findOrFail($id);

        return view('admin.professional.detail', compact('professional'));
    }

    // ============================
    // VERIFIKASI PROFESSIONAL
    // ============================
    public function verify($id)
    {
        $professional = ProfessionalProfile::findOrFail($id);

        $professional->update([
            'status_aktif' => true,
        ]);

        return redirect()
            ->route('admin.professional.pending')
            ->with('success', 'Profesional berhasil diverifikasi!');
    }

    // ============================
    // TOLAK PROFESSIONAL
    // ============================
    public function reject($id)
    {
        $professional = ProfessionalProfile::findOrFail($id);

        $professional->delete();

        return redirect()
            ->route('admin.professional.pending')
            ->with('success', 'Profesional telah ditolak & dihapus.');
    }



}
