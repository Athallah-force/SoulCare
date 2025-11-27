<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminClientController extends Controller
{
    // ============================
    // TAMPIL LIST CLIENT
    // ============================
    public function index()
    {
        $clients = User::where('tipe_pengguna', 'Client')->get();
        return view('admin.clients.index', compact('clients'));
    }

    // ============================
    // FORM CREATE CLIENT
    // ============================
    public function create()
    {
        return view('admin.clients.create');
    }

    // ============================
    // SIMPAN CLIENT BARU
    // ============================
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
            'tipe_pengguna' => 'Client',
        ]);

        return redirect()->route('admin.client.index')->with('success', 'Client berhasil ditambahkan');
    }

    // ============================
    // FORM EDIT CLIENT
    // ============================
    public function edit($id)
    {
        $client = User::findOrFail($id);

        if ($client->tipe_pengguna !== 'Client') {
            abort(403);
        }

        return view('admin.clients.edit', compact('client'));
    }

    // ============================
    // UPDATE CLIENT
    // ============================
    public function update(Request $request, $id)
    {
        $client = User::findOrFail($id);

        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => "required|email|unique:users,email,$id",
            'nomor_telepon' => 'nullable|string',
            'password' => 'nullable|min:6',
        ]);

        $client->name = $request->name;
        $client->email = $request->email;
        $client->nomor_telepon = $request->nomor_telepon;

        if ($request->password) {
            $client->password = Hash::make($request->password);
        }

        $client->save();

        return redirect()->route('admin.client.index')->with('success', 'Client berhasil diperbarui');
    }

    // ============================
    // DELETE CLIENT
    // ============================
    public function destroy($id)
    {
        $client = User::findOrFail($id);

        if ($client->tipe_pengguna !== 'Client') {
            abort(403);
        }

        $client->delete();

        return redirect()->route('admin.client.index')->with('success', 'Client berhasil dihapus');
    }
}
