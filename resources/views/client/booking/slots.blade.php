@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Pilih Jadwal untuk {{ $professional->user->nama_lengkap }}</h2>

    <h4>Spesialisasi: {{ $professional->specialization->nama_spesialisasi ?? '-' }}</h4>

    <hr>

    @if ($slots->isEmpty())
        <p>Tidak ada slot tersedia.</p>
    @else
        <form action="/booking/{{ $professional->professional_profile_id }}/create" method="POST">
            @csrf

            <div class="mb-3">
                <label>Pilih Slot</label>
                <select name="slot_id" class="form-control" required>
                    <option value="">-- Pilih Jadwal --</option>
                    @foreach ($slots as $slot)
                        <option value="{{ $slot->slot_id }}">
                            {{ $slot->hari }} — 
                            {{ \Carbon\Carbon::parse($slot->jam_mulai)->format('H:i') }} -
                            {{ \Carbon\Carbon::parse($slot->jam_akhir)->format('H:i') }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button class="btn btn-success">Konfirmasi Booking</button>
        </form>
    @endif
</div>
@endsection
