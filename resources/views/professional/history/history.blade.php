@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Riwayat Klinis & Sesi</h1>
    <p>Daftar seluruh sesi konsultasi yang pernah Anda lakukan.</p>

    <hr>

    @if ($sessions->isEmpty())
        <p>Belum ada sesi klinis.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Klien</th>
                    <th>Tanggal Janji</th>
                    <th>Status</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sessions as $session)
                <tr>
                    <td>{{ $session->client->user->nama_lengkap }}</td>
                    <td>{{ $session->tanggal_janji }}</td>
                    <td>{{ $session->status }}</td>
                    <td>
                        <a href="{{ route('professional.clinical.history.show', $session->id) }}" 
                           class="btn btn-primary btn-sm">
                            Lihat
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

</div>
@endsection
