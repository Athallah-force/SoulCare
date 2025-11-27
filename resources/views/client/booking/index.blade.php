@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Pilih Profesional</h2>

    @foreach ($professionals as $pro)
        <div class="card mb-3">
            <div class="card-body">
                <h4>{{ $pro->user->nama_lengkap }}</h4>
                <p>Spesialisasi: {{ $pro->specialization->nama_spesialisasi ?? '-' }}</p>
                <p>Tarif: Rp {{ number_format($pro->tarif_sesi, 0, ',', '.') }}</p>

                <a href="/booking/{{ $pro->professional_profile_id }}" class="btn btn-primary">Lihat Jadwal</a>
            </div>
        </div>
    @endforeach
</div>
@endsection
