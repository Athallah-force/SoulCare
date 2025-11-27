<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Session;
use App\Models\Transaction;
use App\Models\ClientProfile;
use Illuminate\Support\Facades\Auth;

class ClientHistoryController extends Controller
{
    // Riwayat Janji Temu (Session)
    public function sessions()
    {
        $client = ClientProfile::where('user_id', Auth::id())->first();

        $sessions = Session::with('professional.user')
            ->where('client_id', $client->client_profile_id)
            ->orderBy('waktu_mulai', 'desc')
            ->get();

        return view('history.sessions', compact('sessions'));
    }

    // Riwayat Transaksi
    public function transactions()
    {
        $client = ClientProfile::where('user_id', Auth::id())->first();

        $transactions = Transaction::with('session.professional.user')
            ->whereHas('session', function($q) use ($client) {
                $q->where('client_id', $client->client_profile_id);
            })
            ->orderBy('tanggal_transaksi', 'desc')
            ->get();

        return view('history.transactions', compact('transactions'));
    }
}
