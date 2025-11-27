@extends('layouts.app')

@section('content')
<div class="container">

    <h2>Riwayat Janji Temu</h2>
    <hr>

    @if ($sessions->isEmpty())
        <p>Belum ada riwayat janji temu.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Profesional</th>
                    <th>Jenis Sesi</th>
                    <th>Waktu Mulai</th>
                    <th>Waktu Akhir</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sessions as $session)
                <tr>
                    <td>{{ $session->professional->user->nama_lengkap }}</td>
                    <td>{{ $session->jenis_sesi }}</td>
                    <td>{{ $session->waktu_mulai }}</td>
                    <td>{{ $session->waktu_akhir }}</td>
                    <td>{{ $session->status_sesi }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

</div>
@endsection
