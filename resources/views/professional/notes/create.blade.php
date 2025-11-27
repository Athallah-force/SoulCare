@extends('professional.layout')

@section('content')
<h2>Buat Catatan Klinis</h2>

<form action="{{ route('professional.notes.store') }}" method="POST">
    @csrf

    <input type="hidden" name="appointment_id" value="{{ $appointment->id ?? '' }}">
    <input type="hidden" name="client_id" value="{{ $appointment->client_id ?? '' }}">

    <div class="mb-3">
        <label>Ringkasan Sesi</label>
        <textarea name="summary" class="form-control" required></textarea>
    </div>

    <div class="mb-3">
        <label>Catatan Lengkap</label>
        <textarea name="notes" class="form-control"></textarea>
    </div>

    <div class="mb-3">
        <label>Jenis Sesi</label>
        <input name="session_type" class="form-control" placeholder="Contoh: Konsultasi, Follow-up">
    </div>

    <button class="btn btn-success">Simpan</button>
</form>
@endsection
