@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Ketersediaan Profesional</h1>
    <p>Lihat daftar profesional beserta jadwal tersedia untuk konsultasi.</p>

    <hr>

    @foreach ($professionals as $professional)
        <div class="card mb-3">
            <div class="card-body">

                <h4>{{ $professional->user->nama_lengkap }}</h4>

                <p>
                    <strong>Spesialisasi:</strong>
                    {{ $professional->specialization ? $professional->specialization->nama_spesialisasi : 'Tidak ada' }}
                </p>

                <p><strong>Tarif Sesi:</strong> Rp {{ number_format($professional->tarif_sesi, 0, ',', '.') }}</p>

                <h5>Ketersediaan:</h5>

                @if ($professional->availabilitySlots->isEmpty())
                    <p>Tidak ada jadwal tersedia.</p>
                @else
                    <ul>
                        @foreach ($professional->availabilitySlots as $slot)
                            <li>
                                {{ $slot->hari }} :
                                {{ $slot->jam_mulai }} - {{ $slot->jam_selesai }}
                            </li>
                        @endforeach
                    </ul>
                @endif

                {{-- Tombol booking (optional untuk nanti) --}}
                <a href="#" class="btn btn-primary">Buat Janji</a>
            </div>
        </div>
    @endforeach

</div>
@endsection
