@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Manajemen Jadwal</h1>

    <a href="{{ route('professional.availability.create') }}" class="btn btn-primary mb-3">Tambah Jadwal</a>

    @if ($slots->isEmpty())
        <p>Tidak ada jadwal yang ditambahkan.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Hari</th>
                    <th>Jam Mulai</th>
                    <th>Jam Selesai</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($slots as $slot)
                <tr>
                    <td>{{ $slot->hari }}</td>
                    <td>{{ $slot->jam_mulai }}</td>
                    <td>{{ $slot->jam_selesai }}</td>
                    <td>
                        <form action="{{ route('professional.availability.delete', $slot->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

</div>
@endsection


@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Manajemen Ketersediaan</h1>
    <p>Atur jadwal kapan Anda tersedia untuk konsultasi.</p>

    {{-- Notifikasi --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <hr>

    <h3>Tambah Jadwal Baru</h3>

    <form action="{{ route('professional.availability.store') }}" method="POST">
        @csrf
        <div class="row">

            <div class="col-md-3">
                <label>Hari</label>
                <select name="hari" class="form-control" required>
                    <option value="">-- Pilih Hari --</option>
                    @foreach(['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'] as $hari)
                        <option value="{{ $hari }}">{{ $hari }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3">
                <label>Jam Mulai</label>
                <input type="time" name="jam_mulai" class="form-control" required>
            </div>

            <div class="col-md-3">
                <label>Jam Selesai</label>
                <input type="time" name="jam_selesai" class="form-control" required>
            </div>

            <div class="col-md-3 d-flex align-items-end">
                <button class="btn btn-primary w-100">Tambah</button>
            </div>

        </div>
    </form>

    <hr>

    <h3>Daftar Ketersediaan</h3>

    @if ($slots->isEmpty())
        <p>Belum ada jadwal tersedia.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Hari</th>
                    <th>Jam Mulai</th>
                    <th>Jam Selesai</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($slots as $slot)
                <tr>
                    <td>{{ $slot->hari }}</td>
                    <td>{{ $slot->jam_mulai }}</td>
                    <td>{{ $slot->jam_selesai }}</td>
                    <td>
                        <form action="{{ route('professional.availability.destroy', $slot->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    @endif
</div>
@endsection
