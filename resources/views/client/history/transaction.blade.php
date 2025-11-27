@extends('layouts.app')

@section('content')
<div class="container">

    <h2>Riwayat Transaksi</h2>
    <hr>

    @if ($transactions->isEmpty())
        <p>Belum ada transaksi.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Profesional</th>
                    <th>Jumlah</th>
                    <th>Status</th>
                    <th>Metode</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $trx)
                <tr>
                    <td>{{ $trx->session->professional->user->nama_lengkap }}</td>
                    <td>Rp {{ number_format($trx->jumlah_pembayaran, 0, ',', '.') }}</td>
                    <td>{{ $trx->status_pembayaran }}</td>
                    <td>{{ $trx->metode_pembayaran ?? '-' }}</td>
                    <td>{{ $trx->tanggal_transaksi }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

</div>
@endsection
