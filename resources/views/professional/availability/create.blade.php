@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Jadwal Ketersediaan</h2>

    <form action="{{ route('professional.availability.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Hari</label>
            <select name="hari" class="form-control" required>
                <option value="">Pilih</option>
                <option>Senin</option>
                <option>Selasa</option>
                <option>Rabu</option>
                <option>Kamis</option>
                <option>Jumat</option>
                <option>Sabtu</option>
                <option>Minggu</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Jam Mulai</label>
            <input type="time" name="jam_mulai" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Jam Selesai</label>
            <input type="time" name="jam_selesai" class="form-control" required>
        </div>

        <button class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
